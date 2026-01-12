@extends('layouts.app')

@section('title', 'Reservasi - JOSS GANDOS')

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="section-title text-start">RESERVASI MEJA</h1>
            
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('reservation.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="customer_name" class="form-label">Nama Lengkap *</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Nomor Telepon *</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="guest_count" class="form-label">Jumlah Tamu *</label>
                                        <select class="form-control" id="guest_count" name="guest_count" required>
                                            <option value="">Pilih jumlah</option>
                                            @for($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}">{{ $i }} Orang</option>
                                            @endfor
                                            <option value="11">Lebih dari 10 Orang</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="reservation_date" class="form-label">Tanggal Reservasi *</label>
                                        <input type="date" class="form-control" id="reservation_date" name="reservation_date" required min="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="reservation_time" class="form-label">Waktu *</label>
                                        <select class="form-control" id="reservation_time" name="reservation_time" required>
                                            <option value="">Pilih waktu</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="19:00">19:00</option>
                                            <option value="20:00">20:00</option>
                                            <option value="21:00">21:00</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="special_request" class="form-label">Permintaan Khusus (Opsional)</label>
                                    <textarea class="form-control" id="special_request" name="special_request" rows="3" placeholder="Contoh: Meja dekat jendela, ada anak kecil, alergi seafood, dll."></textarea>
                                </div>
                                
                                <div class="alert alert-info">
                                    <small>
                                        <i class="fas fa-info-circle"></i> 
                                        Reservasi akan dikonfirmasi melalui email atau telepon dalam waktu 1x24 jam.
                                    </small>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">Pesan Sekarang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Set minimum date to today
    document.getElementById('reservation_date').min = new Date().toISOString().split('T')[0];
</script>
@endsection