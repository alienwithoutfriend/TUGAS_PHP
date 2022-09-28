<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 2 - Chummaedi amrullah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h2 class="alert alert-success text-center mt-3">PT. SPAMMER SEJATI</h2>
        
        <form method="post">
            <div class="form-group mb-3">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Masukan nama anda" name="nama">
            </div>
            
            <label for="">Agama</label>
            <select class="form-select mb-3" name="agama" aria-label="Default select example">
            <option selected>--PILIH AGAMA--</option>
            <option value="islam">Islam</option>
            <option value="hindu">Hindu</option>
            <option value="kristen">Kristen</option>
            <option value="budha">Budha</option>
            <option value="konghucu">Konghucu</option>


            </select>

            <label for="">Jabatan</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jabatan" id="manager" value="manager">
             <label class="form-check-label" for="manager">
                  Manager
              </label>
                </div>
                    <div class="form-check">
                 <input class="form-check-input" type="radio" name="jabatan" id="asisten" value="asisten">
                     <label class="form-check-label" for="asisten">
                   Asisten
             </label>
                </div>
                <div class="form-check">
              <input class="form-check-input" type="radio" name="jabatan" id="kabag" value="kabag">
             <label class="form-check-label" for="kabag">
                  Kabag
              </label>
                </div>
                    <div class="form-check">
                 <input class="form-check-input" type="radio" name="jabatan" id="kabag" value="kabag">
                     <label class="form-check-label mb-3" for="kabag">
                   Staff
             </label>

                </div>
                <label for="">Status Pernikahan</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="pernikahan" id="menikah" value="menikah">
             <label class="form-check-label" for="menikah">
                  Menikah
              </label>
                </div>
                    <div class="form-check">
                 <input class="form-check-input" type="radio" name="pernikahan" id="belum_menikah" value="belum menikah">
                     <label class="form-check-label mb-3" for="belum_menikah">
                   Belum Menikah
             </label>
            </div>

            <div class="form-group mb-3">
                <label for="">Jumlah Anak</label>
                <input type="text" class="form-control" name="janak" placeholder="Masukan Jumlah Anak Anda">
            </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                 <button class="btn btn-success" type="submit" name="simpan">SUBMIT</button>
                 <button class="btn btn-success" type="reset">RESET</button>
                    </div>

        </form>
        <?php
            if (isset($_POST["simpan"])) {
                $nama = $_POST['nama'];
                $agama = $_POST['agama'];
                $jabatan = $_POST['jabatan'];
                $pernikahan = $_POST['pernikahan'];
                $janak = $_POST['janak'];
            switch ($jabatan) {
                case 'manager':
                    $gapok = 20000000;
                    break;
                case 'asisten':
                    $gapok = 15000000;
                    break;
                case 'kabag':
                    $gapok = 10000000;
                    break;
                case 'staff':
                    $gapok = 4000000;
                    break;
            
                default:
                    $gapok = 0;
                    break;
            }
            $tunjangan_jabatan = (20 * $gapok)/100;
            if ($pernikahan == "menikah" && $janak <= 2 ) {
                $tunjangan_keluarga = (5 * $gapok)/100;
            }elseif ($pernikahan == "menikah" && $janak <=5 ) {
                $tunjangan_keluarga = (10 * $gapok)/100;
            }elseif ($pernikahan == "menikah" && $janak >5 ) {
                $tunjangan_keluarga = (15 * $gapok)/100;
            }else{
                $tunjangan_keluarga = 0;
            }
            $gaji_kotor = $gapok + $tunjangan_jabatan + $tunjangan_keluarga;
            
            $zakat = ($agama == "islam" && $gaji_kotor >= 6000000)?(2.5 * $gaji_kotor)/100 : 0;
            
            $take_home_pay = $gaji_kotor - $zakat;
            
            ?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Keterangan Gaji</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             <p>Nama       : <?=$nama ?></p>
             <p>Agama      : <?=$agama ?></p>
             <p>Jabatan    : <?=$jabatan ?></p>
             <p>Status     : <?=$pernikahan ?></p>
             <p>Jumlah Anak: <?=$janak ?></p>
             <p>Gaji Pokok : <?="Rp.".number_format($gapok,2,",",".") ?></p>
             <p>Tunjangan Jabatan : <?="Rp.".number_format($tunjangan_jabatan,2,",",".") ?></p>
             <p>Tunjangan Keluarga : <?="Rp.".number_format($tunjangan_keluarga,2,",",".") ?></p>
             <p>Gaji Kotor : <?="Rp.".number_format($gaji_kotor,2,",",".") ?></p>
             <p>Zakat : <?="Rp.".number_format($zakat,2,",",".") ?></p>
             <p>Take Home Pay : <?="Rp.".number_format($take_home_pay,2,",",".") ?></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
            </div>
            </div>
            <?php
        }

        ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        const modal = new bootstrap.Modal("#exampleModal");
        modal.show();
    </script>
</body>
</html>