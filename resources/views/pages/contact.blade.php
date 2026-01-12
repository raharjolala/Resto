@extends('layouts.app')

@section('title', 'Kontak - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="height: 60vh; margin-top: 76px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Hubungi<br>
                            <span>JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Kami siap melayani Anda dengan sepenuh hati
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="section-padding" data-animate>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-5">
                            <h3 class="mb-4">Kirim Pesan</h3>
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Lengkap *</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subjek *</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan *</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h4 class="text-primary mb-4">
                                <i class="fas fa-map-marker-alt me-2"></i> Alamat
                            </h4>
                            <p class="mb-0">JL Baye Kuliner No. 123, Jakarta, Indonesia</p>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h4 class="text-primary mb-4">
                                <i class="fas fa-phone me-2"></i> Telepon
                            </h4>
                            <p class="mb-0">(021) 1234-5678</p>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h4 class="text-primary mb-4">
                                <i class="fas fa-envelope me-2"></i> Email
                            </h4>
                            <p class="mb-0">info@jossgandos.com</p>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="text-primary mb-4">
                                <i class="fas fa-clock me-2"></i> Jam Operasional
                            </h4>
                            <p class="mb-1"><strong>Setiap Hari</strong></p>
                            <p class="mb-0">10:00 - 22:00 WIB</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="ratio ratio-16x9">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1641914256999!5m2!1sen!2sus" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection