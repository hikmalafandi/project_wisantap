<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Details</title>
        <link href="{{ asset('style/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Lobster+Two&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('style/styles.css') }}">
    </head>

    <body class="inter" style="background-color: #192A56;">
    @include('layouts.navbar')

        <section class="d-flex" id="details">
            <div class="viewDetails w-100">
               @foreach ($destinasi as $item)
                    <div class="kotakDetails">
                    <div class="borderDetails position-absolute top-50 lef-Details translate-middle">
                      <h1 class="pad-Destinasi cusfontDestinasi">{{ $item->nama }}</h1>
                      <img class="fotoDestinasi1" src="images/{{ $item->gambar }}">
                      <br><br>
                      <h1 class="tentangDestinasi">Tentang Wisata</h1>
                      <p>
                        {{ $item->alamat }}
                      </p>
                      <p class="deskripsiDestinasi">
                        {{ $item->deskripsi }}
                        {{-- Situ Cipanten merupakan tempat wisata yang terdapat di Kecamatan Sindang, Kabupaten Majalengka, Jawa Barat.  
                          Kawasan destinasi ini merupakan favorit masyarakat Majalengka. 
                          Situ Cipanten memiliki keindahan danau yang eksotis dengan air yang segar. 
                          Situ Cipanten memiliki air yang sangat jernih hingga terlihat bisa melihat ke dasar serta bisa melihat ikan - ikan yang ada di danau ini. 
                          Keindahan kawasan ini ditambah dengan hutan di sekeliling situ yang menambah keasrian dan kesegaran udara di sekitarnya. 
                          Bahkan pada siang hari, kawasan wisata ini nyaman untuk disinggahi. --}}
                      </p>
          
                      <p class="harga">Harga Tiket<br>{{ $item->harga }} / Orang</p>
                      <a href="form_tiket.html" type="button" class="btn btn-dark text-white">Beli Tiket</a><br>
                    </div>
                    <br><br><br><br>
                    <div class="footer text-center border-top pt-2">
                        <p class="text-white">Copyright 2022 WisanTap</p>
                    </div>
                </div>
               @endforeach
            </div>
        </section>
        <script src = "{{ asset('js/jquery-3.6.1.min.js') }}"></script>
        <script src = "{{ asset('style/bootstrap/js/bootstrap.js') }}"></script>     
    </body>
</html>