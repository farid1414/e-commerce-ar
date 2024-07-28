<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Stok Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="form-update">
                <div class="modal-body">
                    <div class="d-flex justify-content-between">
                        <p>Stok produk <span id="produk"></span> saat ini :</p>
                        <p class="text-muted stock-produk">0 Produk </p>
                    </div>
                    <input type="hidden" readonly name="uuid" id="uuid">
                    <div class="form-group">
                        <input type="number" name="stock" required id="stock" placeholder="Stok Baru"
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-save"><i class="fas fa-save"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
    <script>
        $('body').on('click', '.update-stock', function() {
            let uuid = $(this).attr('data-uuid')
            let stock = $(this).attr('data-stock')
            let produk = $(this).attr('data-produk')

            $('#uuid').val(uuid)
            $('#stock').val('')
            $('#modal-update').find('.stock-produk').html(`${stock} Produk`)
            $('#modal-update').find('#produk').html(produk)
            $('#modal-update').modal('show')
        })

        $('body').on('submit', '#form-update', function(e) {
            e.preventDefault()
            const action = "{{ route($this_helper . 'update-stock') }}"
            const ajax = new AjaxRequest(action, "POST", "swal", {
                beforeSend: function() {
                    addLoader2El($('#btn-save'), "Saving...");
                    $('#btn-save').attr('disabled', true);
                }
            })

            ajax.onfail = () => {
                removeLoader($('#btn-save'))
            }

            let data = new FormData(this)

            ajax.submit(data, (resp) => {
                if (resp.success) {
                    swal('success', null, resp.message ?? "Success update stock");
                    removeLoader($('#btn-save'))
                    $('#modal-update').modal('hide')
                    $('#table_product_active').DataTable().ajax.reload();
                    $('#table_produk_kurang').DataTable().ajax.reload();
                    $('#table_produk_arsip').DataTable().ajax.reload();
                }
            })
        })
    </script>
@endpush
