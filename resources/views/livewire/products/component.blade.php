<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{$componentName}} | {{$pageTitle}}</b>
                </h4>
                <ul class="tab tab-pills">
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark btn btn-sm" data-toggle="modal" data-target="#theModal">
                            Agregar
                        </a>
                    </li>
                </ul>
            </div>
            @include('common.searchbox')

            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white" style="background: #3b3f5c">
                        <tr>
                            <th class="table-th text-white">DESCRIPCION</th>
                            <th class="table-th text-white">BARCODE</th>
                            <th class="table-th text-white">CATEGORÍA</th>
                            <th class="table-th text-white">PRECIO</th>
                            <th class="table-th text-white">STOCK</th>
                            <th class="table-th text-white">INV. MIN</th>
                            <th class="table-th text-white">IMAGEN</th>
                            <th class="table-th text-white">ACTIONS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $product)
                        <tr>
                            <td>
                                <h6>{{$product->name}}</h6>
                            </td>
                            <td>
                                <h6>{{$product->barcode}}</h6>
                            </td>
                            <td>
                                <h6>{{$product->category}}</h6>
                            </td>
                            <td>
                                <h6>{{$product->price}}</h6>
                            </td>
                            <td>
                                <h6>{{$product->stock}}</h6>
                            </td>
                            <td>
                                <h6>{{$product->alerts}}</h6>
                            </td>
                            <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/products/' . $product->imagen ) }}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                    </span>
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)"
                                   wire:click.prevent="Edit({{$product->id}})"
                                   class="btn btn-dark mtmobile" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)"
                                   onclick="Confirm('{{$product->id}}')"
                                   class="btn btn-dark" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.products.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('product-added', msg =>{
            $('#theModal').modal('hide');
        });
        window.livewire.on('product-updated', msg =>{
            $('#theModal').modal('hide');
        });
        window.livewire.on('product-deleted', msg =>{
            //noty
        });
        window.livewire.on('show-modal', msg =>{
            $('#theModal').modal('show');
        });
        window.livewire.on('hide-modal', msg =>{
            $('#theModal').modal('hide');
        });
        window.livewire.on('hidden.bs.modal', msg =>{
            $('.er').css('display', 'none')
        });
    });
    function Confirm(id, products)
    {
        if (products > 0)
        {
            swal('No se puede eliminar la categoria porque tiene productos relacionados.')
            return;
        }
        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3B3F5C'
        }).then(function (result) {
            if (result.value){
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        });
    }
</script>

