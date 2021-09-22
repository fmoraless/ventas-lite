<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AsignarComponent extends Component
{
    use WithPagination;

    public $componentName, $role, $permisosSelected = [], $old_permissions = [];
    private $pagination = 10;

    public function mount()
    {
        $this->role = 'Elegir';
        $this->componentName = "Asignar Permisos";

    }
    public function render()
    {
        $permisos = Permission::select('name', 'id', DB::raw("0 as checked") )
            ->orderBy('name', 'asc')
            ->paginate($this->pagination);

        if ($this->role != 'Elegir')
        {
            $list = Permission::join('role_has_permissions as rp', 'rp.permission_id', 'permissions.id')
                ->where('role_id', $this->role)->pluck('permissions.id')->toArray();

            $this->old_permissions = $list;
        }
        if ($this->role != 'Elegir')
        {
            foreach ($permisos as $permiso) {
                $role = Role::find($this->role);
                $tienePermiso = $role->hasPermissionTo($permiso->name);
                if ($tienePermiso) {
                    $permiso->checked = 1;
                }
            }
        }
        return view('livewire.asignar.component', [
            'roles' => Role::orderBy('name', 'asc')->get(),
            'permisos' => $permisos
        ])->extends('layouts.theme.app')->section('content');
    }

    protected $listeners = ['revokeall' => 'RemoveAll'];

    public function RemoveAll()
    {
        if ($this->role == 'Elegir')
        {
            $this->emit('sync-error', 'Selecciona un rol válido');
            return;
        }
        $role = Role::find($this->role);
        $role->syncPermissions([0]);
        $this->emit('removeall', "Se revocaron todos los permisos al rol $role->name ");
    }

    public function SyncAll()
    {
        if ($this->role == 'Elegir')
        {
            $this->emit('sync-error', 'Selecciona un rol válido');
            return;
        }
        $role = Role::find($this->role);
        $permisos = Permission::pluck('id')->toArray();

        $role->syncPermissions($permisos);
        $this->emit('syncall', "Se sincronizaron todos los permisos al rol $role->name ");
    }

    public function SyncPermiso($state, $permisoName)
    {
        if ($this->role != 'Elegir')
        {
            $roleName = Role::find($this->role);
            if ($state) {
                $roleName->givePermissionTo($permisoName);
                $this->emit('permi', 'Permiso asignado correctamente.');
            } else {
                $roleName->revokePermissionTo($permisoName);
                $this->emit('permi', 'Permiso revocado correctamente.');
            }

        } else {
            $this->emit('permi', "Elige un rol válido");
        }


    }
}
