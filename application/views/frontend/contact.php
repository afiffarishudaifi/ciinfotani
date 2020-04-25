<!DOCTYPE html>
<html lang="en">

<?php
    $this->load->view('frontend/_partials/head');
?>

<body>
    <!-- Preloader -->
    <?php
    $this->load->view('frontend/_partials/header');
    ?>
    <!-- Header Area End -->


    <!-- Contact Area Start -->
    <section class="akame-contact-area bg-gray section-padding-80">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Tinggalkan Pesan</h2>
                        <p style="color: black;">Silahkan masukkan pertanyaan tentang apa yang anda butuhkan.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <form action="<?= base_url('kontak/send_mail')?>" method="post" class="akame-contact-form border-0 p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="nama" class="form-control mb-30" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" class="form-control mb-30" placeholder="Masukkan Email" required>
                            </div>
                            <div class="col-12">
                                <textarea name="komentar" class="form-control mb-30" placeholder="Masukkan pertanyaan"  required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" name="kirim" class="btn akame-btn btn-success mt-15 active">Kirim Komentar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->

    <!-- Footer Area Start -->
    <?php
    $this->load->view('frontend/_partials/footer');
?>
    <!-- Footer Area End -->

    <!-- All JS Files -->
    <?php
    $this->load->view('frontend/_partials/js');
    ?>
</body>

</html>
