<template>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Peserta Didik</h3>
              <div class="card-tools">
                    <button class="btn btn-sm btn-outline-success" @click="newModal">
                      <i class="fa fa-user-plus purple">&nbsp;Tambah</i></button>
              </div>
                <div class="card-tools mr-2">
                  <button class="btn btn-sm btn-outline-info" @click="editModal()">
                      <i class="fa fa-edit ">&nbsp;Ubah</i></button>
              </div>
              <div class="card-tools mr-2">
                  <button class="btn btn-sm btn-outline-danger" @click="hapusdata(form.id)">
                      <i class="fa fa-trash">&nbsp;Hapus</i></button>
              </div>
              <div class="card-tools mr-2" v-if="user.type == 'admin' || user.type == 'TU' || user.type == 'superuser' ">
                    <button class="btn btn-sm btn-outline-info" @click="Modaltahun">
                      <i class="fa fa-school red">&nbsp;Tahun Ajaran</i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-hover table-sm table-responsive-sm">
                <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>NAMA</th>
                  <th>NIPD</th>
                  <th>NISN</th>
                  <th>TEMPAT LAHIR</th>
                  <th>TANGGAL LAHIR</th>
                  <th>AGAMA</th>
                  <th>TAHUN AJARAN</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="item in siswa.data" :key="item.id" @click="selectRow(item)" :class="{'pilihtr' : selectdata == item.id }">
                    <td>{{item.id}}</td>
                    <td>{{item.nama | Upper}}</td>
                    <td>{{item.NIPD}}</td>
                    <td>{{item.NISN}}</td>
                    <td>{{item.tempat_lahir | UpText}}</td>
                    <td>{{item.tgl_lahir | dt}}</td>
                    <td>{{item.agama}}</td>
                    <td>{{item.Tahun_Ajaran}}</td>
                </tr>

                </tbody>
                <tfoot class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>NAMA</th>
                  <th>NIPD</th>
                  <th>NISN</th>
                  <th>TEMPAT LAHIR</th>
                  <th>TANGGAL LAHIR</th>
                  <th>AGAMA</th>
                  <th>TAHUN AJARAN</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->



            <!-- /.card-body -->
          <div class="card-footer">
              <pagination size="small" align="right" :data="siswa" @pagination-change-page="getResults"></pagination>
          </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" v-show="!editMode" id="tambahLabel">Tambah Data Peserta Didik Baru</h5>
                <h5 class="modal-title" v-show="editMode" id="tambahLabel">Edit data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? updateData() : CreateData()">
            <div class="modal-body">

                <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input v-model="form.nama" type="text" name="nama" placeholder="Nama Lengkap"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('nama') }">
                <has-error :form="form" field="nama"></has-error>
                </div>
                </div>

                <div class="form-group row">
                <label for="NIPD" class="col-sm-2 col-form-label">NIPD</label>
                <div class="col-sm-10">
                <input v-model="form.NIPD" type="number" name="NIPD" placeholder="NIPD"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('NIPD') }">
                <has-error :form="form" field="NIPD"></has-error>
                </div>
                </div>

                <div class="form-group row">
                  <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                  <select v-model="form.jenis_kelamin" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                          <option>Laki-Laki</option>
                          <option>Perempuan</option>
                  </select>
                </div>
                </div>

                <div class="form-group row">
                    <label for="NISN" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input v-model="form.NISN" type="text" name="NISN" placeholder="NISN"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('NISN') }">
                    <has-error :form="form" field="NISN"></has-error>
                </div>
                </div>

                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input v-model="form.tempat_lahir" type="text" name="tempat_lahir" placeholder="Tempat Lahir"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('tempat_lahir') }">
                    <has-error :form="form" field="tempat_lahir"></has-error>
                </div>
                </div>

                <div class="form-group row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="input-group col-sm-10">

                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>

                    <input v-model="form.tgl_lahir" type="date" id="tgl_lahir" name="tgl_lahir" class="form-control"
                    :class="{ 'is-invalid': form.errors.has('tgl_lahir') }" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                    placeholder="dd/mm/yyyy" data-mask>
                        <has-error :form="form" field="tgl_lahir"></has-error>
                  </div>
                </div>


                <div class="form-group row">
                    <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                <input v-model="form.NIK" type="number" name="NIK" placeholder="NIK"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('NIK') }">
                <has-error :form="form" field="NIK"></has-error>
                </div>
                </div>

                <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                  <select v-model="form.agama" class="form-control" id="agama" name="agama">
                          <option>Islam</option>
                          <option>Hindu</option>
                          <option>Kristen</option>
                          <option>Katholik</option>
                          <option>Kong Hu Chu</option>
                  </select>
                </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea v-model="form.alamat" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3"
                  :class="{ 'is-invalid': form.errors.has('alamat') }">
                            </textarea>
                            <has-error :form="form" field="alamat"></has-error>
                </div>
                </div>

                <div class="form-group row">
                    <label for="telp" class="col-sm-2 col-form-label">No Telephone</label>
                <div class="col-sm-10">
                <input v-model="form.telp" type="number" name="telp" placeholder="No Telephone"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('telp') }">
                <has-error :form="form" field="telp"></has-error>
                </div>
                </div>
                    <!-- Form Ayah -->
                    <H3 align="center">Biodata Ayah</H3>
                <div class="form-group row">
                    <label for="nama_ayah" class="col-sm-2 col-form-label">Nama Ayah</label>
                <div class="col-sm-10">
                <input v-model="form.nama_ayah" type="text" name="nama_ayah" placeholder="Nama Ayah"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('nama_ayah') }">
                <has-error :form="form" field="nama_ayah"></has-error>
                </div>
                </div>

                <div class="form-group row">
                    <label for="thn_lahir_ayah" class="col-sm-2 col-form-label">Tahun Lahir</label>
                <div class="col-sm-10">
                <input v-model="form.thn_lahir_ayah" type="number" name="thn_lahir_ayah" placeholder="Tahun Lahir"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('thn_lahir_ayah') }">
                <has-error :form="form" field="thn_lahir_ayah"></has-error>
                </div>
                </div>

                <div class="form-group row">
                    <label for="kerja_ayah" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                <div class="col-sm-10">
                <input v-model="form.kerja_ayah" type="text" name="kerja_ayah" placeholder="Kerja Ayah"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('kerja_ayah') }">
                <has-error :form="form" field="kerja_ayah"></has-error>
                </div>
                </div>

                <div class="form-group row">
                    <label for="NIK_ayah" class="col-sm-2 col-form-label">NIK Ayah</label>
                <div class="col-sm-10">
                <input v-model="form.NIK_ayah" type="number" name="NIK_ayah" placeholder="NIK Ayah"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('NIK_ayah') }">
                <has-error :form="form" field="NIK_ayah"></has-error>
                </div>
                </div>

                <div class="form-group row">
                    <label for="Telp_ayah" class="col-sm-2 col-form-label">No Telephone Ayah</label>
                <div class="col-sm-10">
                <input v-model="form.Telp_ayah" type="number" name="Telp_ayah" placeholder="No Telephone Ayah"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('Telp_ayah') }">
                <has-error :form="form" field="Telp_ayah"></has-error>
                </div>
                </div>

                <h3 align="center">Biodata Ibu</h3>
                <div class="form-group row">
                    <label for="nama_ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                <div class="col-sm-10">
                    <input v-model="form.nama_ibu" type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu"
                            :class="{ 'is-invalid': form.errors.has('nama_ibu') }">
                            <has-error :form="form" field="nama_ibu"></has-error>
                </div>
                </div>

                <div class="form-group row">
                    <label for="thn_lahir_ibu" class="col-sm-2 col-form-label">Tahun Lahir</label>
                <div class="col-sm-10">
                    <input v-model="form.thn_lahir_ibu" type="number" name="thn_lahir_ibu" class="form-control" placeholder="Tahun Lahir Ibu">
                </div>
                </div>

                <div class="form-group row">
                    <label for="kerja_ibu" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                <div class="col-sm-10">
                    <input v-model="form.kerja_ibu" type="text" name="kerja_ibu" class="form-control" placeholder="Kerja Ibu">
                </div>
                </div>

                <div class="form-group row">
                    <label for="NIK_ibu" class="col-sm-2 col-form-label">NIK Ibu</label>
                <div class="col-sm-10">
                    <input v-model="form.NIK_ibu" type="number" name="NIK_ibu" class="form-control" placeholder="NIK Ibu">
                </div>
                </div>

                <div class="form-group row">
                    <label for="Telp_ibu" class="col-sm-2 col-form-label">No Telephone Ibu</label>
                <div class="col-sm-10">
                    <input v-model="form.Telp_ibu" type="number" name="Telp_ibu" class="form-control" placeholder="No Telephone Ibu"
                            :class="{ 'is-invalid': form.errors.has('Telp_ibu') }">
                            <has-error :form="form" field="Telp_ibu"></has-error>
                </div>
                </div>

                <div class="form-group row">
                    <label for="Golongan" class="col-sm-2 col-form-label">Golongan</label>
                <div class="col-sm-10">
                  <select v-model="form.Golongan" class="form-control" id="Golongan" name="Golongan">
                          <option>Umum</option>
                          <option>Perwira</option>
                          <option>WAKAWURI</option>

                  </select>
                </div>
                </div>
                <div class="form-group row">
                    <label for="Tahun_Ajaran" class="col-sm-2 col-form-label">Tahun Ajaran</label>
                <div class="col-sm-10">
                  <select v-model="form.Tahun_Ajaran" class="form-control" id="Tahun_Ajaran" name="Tahun_Ajaran">
                      <option v-for="tahun in ajaran" :key="tahun.id">{{ tahun.Tahun_Ajaran }}</option>

                  </select>
                </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">BATAL</button>
                    <button v-show="editMode" type="submit" class="btn btn-outline-success">UPDATE</button>
                    <button v-show="!editMode" type="submit" class="btn btn-outline-success">SIMPAN</button>
                </div>
            </div>
            </form>
        </div>
        </div>
   </div>

   <!-- modal tahun ajaran -->
    <div class="modal fade bd-example-modal-lg" id="tahun" tabindex="-1" role="dialog" aria-labelledby="tahunLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tahunLabel">Tambah Tahun Ajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <Form @submit.prevent="tambahtahun">
              <div class="modal-body">
                <div class="form-group row">
                    <label for="Tahun_Ajaran" class="col-sm-2 col-form-label">Tahun Ajaran</label>
                <div class="col-sm-10">
                    <input v-model="tahun.Tahun_Ajaran" type="text" name="Tahun_Ajaran"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('Tahun_Ajaran') }">
                    <has-error :form="form" field="Tahun_Ajaran"></has-error>
                </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">BATAL</button>
                <button type="submit" class="btn btn-outline-success">SIMPAN</button>
              </div>

            </Form>
            </div>
        </div>
    </div>
   <!-- end modal tahun ajaran -->

      </div>
      <!-- /.row -->
</template>

<script>
    export default {
        data() {
            return {
                editMode: false,
                selectdata: 0,
                user:{},
                siswa : {},
                ajaran :{},
                tahun : new Form({
                  Tahun_Ajaran: '',
                }),
                form: new Form({
                    id : '',
                    nama : '',
                    NIPD : '',
                    jenis_kelamin: '',
                    NISN : '',
                    tempat_lahir : '',
                    tgl_lahir : '',
                    NIK : '',
                    agama : '',
                    alamat: '',
                    telp: '',
                    nama_ayah: '',
                    thn_lahir_ayah: '',
                    kerja_ayah: '',
                    NIK_ayah: '',
                    Telp_ayah: '',
                    nama_ibu: '',
                    thn_lahir_ibu: '',
                    kerja_ibu: '',
                    NIK_ibu: '',
                    Telp_ibu: '',
                    Golongan: '',
                    Tahun_Ajaran: '',
                    users_id: '',
                })
            }
        },

        methods: {

            selectRow(user){
            (this.selectdata = user.id);
            //console.log('clik', user);
            this.form.reset();
            this.form.clear();
            this.form.fill(user);
            },
                getResults(page = 1){
                    axios.get('api/siswa?page=' + page)
                    .then(response => {this.siswa = response.data;});
            },

            updateData(){
                this.$Progress.start();
                //console.log('Update data');
                this.form.put('api/siswa/'+this.form.id)
                .then(() =>{
                    $('#tambah').modal('hide');
                    toast.fire({
                    icon: 'success',
                    title: 'Data Siswa Berhasil Diperbarui'
                    });
                    Fire.$emit('RefreshData');
                    this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },

            editModal(user){
                if(this.selectdata == 0) {
                    swal.fire({
                    title: 'Pilih data terlebih dahulu? klik pada tabel siswa',
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                    })
                } else {
                this.editMode = true;
                $('#tambah').modal('show');
                }
            },
            newModal(){
                this.editMode = false;
                this.form.reset();
                $('#tambah').modal('show');
            },

            Modaltahun(){
              $('#tahun').modal('show');
            },


            hapusdata(id){
                if(this.selectdata == 0) {
                    swal.fire({
                    title: 'Pilih data terlebih dahulu? klik pada tabel siswa',
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                    })
                } else {
                swal.fire({
                title: 'Anda yakin ingin menghapus data?',
                text: "Data yang sudah terhapus tidak bisa di batalkan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
                }).then((result) => {
                    //kirim data ke server
                    if (result.value) {
                        this.form.delete('api/siswa/'+id).then(()=>{
                            swal.fire(
                            'Data berhasil dihapus.',
                            )
                            Fire.$emit('RefreshData');
                        }).catch(()=> {
                            swal.fire("Gagal", "Data Tidak berhasil Dihapus.",
                            "warning");
                        })
                    }
                })
                }

            },
            loadsiswa(){
                axios.get("api/siswa").then(({ data }) => (this.siswa = data));
                axios.get("api/tahun").then(({ data }) => (this.ajaran = data));
                axios.get("api/user").then(({ data }) => (this.user = data));
            },

            CreateData(){
                this.$Progress.start();
                this.form.post('api/siswa')
                .then(()=>{
                Fire.$emit('RefreshData');
                $('#tambah').modal('hide');

                toast.fire({
                icon: 'success',
                title: 'Siswa Berhasil Ditambahkan'
                });

                this.$Progress.finish();
                })
                .catch(() =>{
                })
            },

            tambahtahun(){
                this.$Progress.start();
                this.tahun.post('api/addtahun')
                .then(()=>{
                Fire.$emit('RefreshData');
                $('#tahun').modal('hide');

                toast.fire({
                icon: 'success',
                title: 'Tahun Ajaran Berhasil Dibuat'
                });

                this.$Progress.finish();
                })
                .catch(() =>{
                })
            }
        },

        created() {
            Fire.$on('searching',()=> {
                let kata = this.$parent.search;
                axios.get('api/carisiswa?q=' + kata).then((data) => {
                    this.siswa = data.data
                }).catch(() => {
                    swal.fire({
                    type: 'error',
                    title: 'WOOPS SOMETING WHENT WRONG',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                    });
                })
            })
            this.loadsiswa();
            //setInterval(() => this.loadsiswa(), 3000)
            Fire.$on('RefreshData',()=> {
                this.loadsiswa();
            });
        }
    }

</script>

