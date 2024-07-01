{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')

@section('content_header')
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item">
        Flash Sale
    </li>
    <li class="breadcrumb-item active">
        Form Flash Sale
    </li>
@stop

{{-- tahap section jangan lupa di tutup --}}
@section('content')
    <section class="section dashboard">
        <form method="POST" id="save-flash-sale">
            <div class="row d-flex flex-wrap justify-content-between">
                <div class="col-12 mb-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Informasi FlashSale.</h5>

                            <div class="mb-4">
                                <label for="flashSaleTitle" class="form-label">Judul Flash Sale</label>
                                <input type="text" name="title" class="form-control" id="flashSaleTitle"
                                    placeholder="Contoh Flash Sale 11.11">
                            </div>
                            <div class="row mb-4">
                                <div class="col mb-3">
                                    <label for="startTime" class="form-label">Waktu Mulai</label>
                                    <input type="datetime-local" name="start_time" class="form-control" id="startTime">
                                </div>
                                <div class="col">
                                    <label for="endTime"class="form-label">Waktu Berakhir
                                        <small>(Durasi Max 1
                                            Minggu)</small></label>
                                    <input type="datetime-local" name="end_time" class="form-control" id="endTime">
                                </div>
                            </div>
                            <hr>
                            <!-- Tabel Produk Flash Sale -->
                            <div id="productTableContainer" class="mt-3">
                                <div class="card top-selling overflow-auto">
                                    <div class="card-body">
                                        <h5 class="card-title">List Semua Produk</h5>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Produk</th>
                                                    <th class="text-center">Nama Produk</th>
                                                    <th class="text-center">Kategori</th>
                                                    <th class="text-center">varian</th>
                                                    <th class="text-center">Harga</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $prod)
                                                    <tr>
                                                        <td class="text-center">
                                                            <img src="{{ url($prod->thumbnail) }}" alt=""
                                                                class="img-thumbnail" />
                                                        </td>
                                                        <td class="text-center">{{ $prod->name }}</td>
                                                        <td class="text-center fw-bold">
                                                            {{ $prod->category->name }}<br /><small>{{ $prod->masterCat->name }}</small>
                                                        </td>
                                                        <th class="text-center">
                                                            @if ($prod->varians->count())
                                                                {{ implode(', ', $prod->varians->pluck('name')->toArray()) }}
                                                            @else
                                                                -
                                                            @endif
                                                        </th>
                                                        <td class="text-center">{{ formatRupiah($prod->harga) }}</td>
                                                        <td class="text-center align-middle">
                                                            <div class="form-check d-flex justify-content-center">
                                                                <input class="form-check-input" name="list_prod[]"
                                                                    type="checkbox" value="{{ $prod->id }}"
                                                                    id="check_prod">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="confirm-prod" class="btn btn-primary mt-3">
                                Konfirmasi Produk
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tabel Produk Flash Sale -->

            <div id="productTableContainer" class="mt-3">
                <div class="card top-selling overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Produk yang Anda Pilih</h5>
                        <table class="table table-bordered table-hover" id="list-product">
                            <thead>
                                <tr>
                                    <th class="text-center">Produk</th>
                                    <th class="text-center">Nama Produk</th>
                                    <th class="text-center">stok</th>
                                    <th class="text-center">Varian</th>
                                    <th class="text-center">Harga Awal</th>
                                    <th class="text-center">Harga Diskon</th>
                                    <th class="text-center">Stok flash sale</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td colspan="6" class="text-center">TIdak ada produk yang dipilih</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>


                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Opsional </div>

                        <div class="d-flex justify-content-between">
                            <p>Gratis Ongkir Semua Produk Flash Sale</p>
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="gratis_ongkir" type="checkbox" role="switch"
                                    id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                            </div>
                        </div>
                        <footer class="blockquote-footer">Ketika di aktifkan maka semua produk yang telah di pilih akan
                            Gratis
                            Ongkir</footer>

                    </div>
                </div>
            </div>

            </div>
            <!-- Content presentasi diskon dari produk yang dipilih -->
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('master.flash-sale.index') }}">
                            <button class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Batal
                            </button>
                        </a>
                        <button type="submit" class="btn btn-primary" id="btn-save"><i class="fas fa-save"></i>
                            Save</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

@stop

@push('js')
    <script>
        let idProd = []
        $('body').on('click', '#confirm-prod', function(e) {
            e.preventDefault()
            idProd = []
            $.each($('input[name="list_prod[]"]'), function(i, val) {
                if ($(val).is(':checked')) {
                    idProd.push($(val).val())
                }
            });

            const action = "{{ route($this_helper . 'get-product') }}"
            const ajax = new AjaxRequest(action, 'GET', 'swal', {
                processData: true,
                contentType: true,
            })

            ajax.onBefore = () => {
                $loaderEl.removeClass('d-none')
            }

            ajax.onfail = () => {
                $loaderEl.addClass('d-none')
            }

            ajax.submit({
                id: idProd
            }, (resp) => {
                if (resp.success) {
                    $loaderEl.addClass('d-none')
                    createProd(resp.data)
                }
            })
        })

        $('body').on('submit', '#save-flash-sale', function(e) {
            console.log('asas');
            e.preventDefault()
            const action = "{{ route($this_helper . 'store') }}"
            const ajax = new AjaxRequest(action)
            ajax.onBefore = () => {
                addLoader2El($('#btn-save'), "Saving...");
                $('#btn-save').attr('disabled', true);
            }

            ajax.onfail = () => {
                removeLoader($('#btn-save'))
            }

            let data = new FormData(this)
            ajax.submit(data, (resp) => {
                if (resp.success) {
                    swal('redirect', '', resp.message ?? "Success set pricelist", resp.url)
                    removeLoader($('#btn-save'))
                }
            })
        })

        const createProd = (data) => {
            let html = '<tr>'
            data.map((prod) => {
                html += `<input type="hidden" name="id[]" value="${prod.id}" >`
                html += `<td> <img src="${prod.image_url}"> </td>`
                html += `<td>${prod.name} </td> <td> ${prod.stock} </td>`
                if (prod.varians.length > 0) {
                    html += '<td> '
                    prod.varians.map(varian => {
                        html += `${varian.name} <br>`
                    })
                    html += '</td>'
                } else {
                    html += '<td> - </td>'
                }
                html += `<td>Rp. ${prod.price} </td>`
                if (prod.varians.length > 0) {
                    html += '<td> '
                    prod.varians.map(varian => {
                        html +=
                            `<input type="hidden" name="id_varian[${prod.id}][]" value="${varian.id}"> <input type="text" name="stok_varian[${prod.id}][]" required class="form-control mb-2" id="exampleInputEmail1" placeholder="varian ${varian.name}, contoh 20"> <br>`
                    })
                    html += '</td>'
                } else {
                    html += '<td> - </td>'
                }
                html += '</tr>'
                console.log("da", prod);
            })
            $('#list-product tbody').html(html)
        }
    </script>
@endpush
