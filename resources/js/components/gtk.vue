<template>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Guru Dan Tenaga Pendidik</h3>
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
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-hover table-sm table-responsive-sm">
                <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>NAMA</th>
                  <th>EMAIL</th>
                  <th>TEMPAT LAHIR</th>
                  <th>TANGGAL LAHIR</th>
                  <th>JENIS PTK</th>
                  <th>SKEP</th>
                  <th>TMT</th>

                </tr>
                </thead>
                <tbody>

                <tr v-for="item in gtk.data" @click="selectRow(item)" :key="item.id" :class="{'pilihtr' : selectdata == item.id }">
                    <td></td>
                    <td>{{item.nama | Upper}}</td>
                    <td>{{item.email}}</td>
                    <td>{{item.tempat_lahir | UpText}}</td>
                    <td>{{item.tgl_lahir | dt}}</td>
                    <td>{{item.jabatan}}</td>
                    <td>{{item.SK}}</td>
                    <td>{{item.TMT | dt}}</td>

                   <!-- <a href="#" @click="editModal(item)"> -->
                       <!-- <i class="fa fa-edit"></i> -->
                   <!-- </a> -->
                   <!-- | -->
                   <!-- <a href="#" @click="hapusdata(item.id)"> -->
                       <!-- <i class="fa fa-trash red"></i> -->
                   <!-- </a> -->


                </tr>

                </tbody>
                <tfoot class="thead-light">
                <tr>
                  <th>#</th>
                  <th>NAMA</th>
                  <th>EMAIL</th>
                  <th>TEMPAT LAHIR</th>
                  <th>TANGGAL LAHIR</th>
                  <th>JENIS PTK</th>
                  <th>SKEP</th>
                  <th>TMT</th>

                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->



            <!-- /.card-body -->
          <div class="card-footer">
              <pagination size="small" align="right" :data="gtk" @pagination-change-page="getResults"></pagination>
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
                <h5 class="modal-title" v-show="!editMode" id="tambahLabel">Tambah Data Guru Dan Tenaga Pendidik</h5>
                <h5 class="modal-title" v-show="editMode" id="tambahLabel">Edit data Guru Dan Tenaga Pendidik</h5>
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
                </div>
                </div>

                <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input v-model="form.email" type="email" name="email" placeholder="Email"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                </div>
                </div>

                <div class="form-group row">
                  <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                  <select v-model="form.jenis_kelamin" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                  </select>
                </div>
                </div>

                <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input v-model="form.tempat_lahir" type="text" name="tempat_lahir" placeholder="Tempat Lahir"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('tempat_lahir') }">
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

                  </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea v-model="form.alamat" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3"
                  :class="{ 'is-invalid': form.errors.has('alamat') }">
                            </textarea>
                </div>
                </div>

                <div class="form-group row">
                    <label for="telp" class="col-sm-2 col-form-label">No Telephone</label>
                <div class="col-sm-10">
                <input v-model="form.telp" type="number" name="telp" placeholder="No Telephone"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('telp') }">
                </div>
                </div>

               <div class="form-group row">
                  <label for="jabatan" class="col-sm-2 col-form-label">Jenis PTK</label>
                  <div class="col-sm-10">
                  <select v-model="form.jabatan" class="form-control" id="jabatan" name="jabatan">
                          <option>Kepala Sekolah</option>
                          <option>Wakil Kepala Sekolah</option>
                          <option>Guru Mapel</option>
                          <option>Tenaga Pendidikan</option>
                  </select>
                </div>
                </div>

                <div class="form-group row">
                    <label for="SK" class="col-sm-2 col-form-label">No SK Mengajar</label>
                <div class="col-sm-10">
                <input v-model="form.SK" type="text" name="SK" placeholder="No SK Mengajar"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('SK') }">
                </div>
                </div>

                <div class="form-group row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">TMT SK Mengajar</label>
                <div class="input-group col-sm-10">
                 <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input v-model="form.TMT" type="date" id="TMT" name="TMT" class="form-control"
                    :class="{ 'is-invalid': form.errors.has('TMT') }" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                    placeholder="dd/mm/yyyy" data-mask>
                    </div>
                </div>

                <div class="form-group row">
                  <label for="mapel" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                  <div class="col-sm-10">
                  <v-select v-model="form.mapel" :options="pelajaran" :reduce="pelajaran => pelajaran.code" label="nama">
                    <template slot="option" slot-scope="option">
                          {{ option.nama }}
                      </template>
                  </v-select>
                  </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button v-show="editMode" type="submit" class="btn btn-success">UPDATE</button>
                    <button v-show="!editMode" type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </div>
            </form>
        </div>
        </div>
   </div>

      </div>
      <!-- /.row -->
</template>

<script>
    export default {
        data() {
            return {
                editMode: false,
                gtk : {},
                selectdata: 0,
                form: new Form({
                    id : '',
                    nama : '',
                    email : '',
                    jenis_kelamin: '',
                    tempat_lahir : '',
                    tgl_lahir : '',
                    alamat: '',
                    telp: '',
                    jabatan: 'Guru Mapel',
                    gtk_id: '',
                    mapel: '',
                    SK: '',
                    TMT: '',
                    photo: '',
                }),
                pelajaran : [
                  {
                   nama :'Pendidikan Agama dan Budi Pekerti',
                   code :'PAI'
                   },{
                   nama :'Pendidikan Pancasila dan Kewarganegaraan',
                   code :'PPKN'
                  },{
                   nama :'Bahasa Indoensia',
                   code :'BINDO'
                  },{
                   nama :'Matematika',
                   code :'MTK'
                  },{
                   nama :'Sejarah Indonesia',
                   code :'SEJNDO'
                  },{
                   nama :'Bahasa Inggris',
                   code :'BING'
                  },{
                   nama :'Seni Budaya',
                   code :'SENBUD'
                  },{
                   nama :'Pendidikan Jasmani, Olahraga dan Kesehatan',
                   code :'PJOK'
                  },{
                   nama :'Prakarya dan Kewirausahaan',
                   code :'PKWU'
                  },{
                   nama :'Bahasa Jepang',
                   code :'BJEP'
                  },{
                   nama :'Biologi',
                   code :'BIO'
                  },{
                   nama :'Kimia',
                   code :'KIM'
                  },{
                   nama :'Fisika',
                   code :'FIS'
                  },{
                   nama :'Sosiologi',
                   code :'SOS'
                  },{
                   nama :'Geografi',
                   code :'Geo'
                  },{
                   nama :'Ekonomi',
                   code :'Eko'
                  }
                  ],
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
                axios.get('api/gtk?page=' + page)
                .then(response => {this.gtk = response.data;});
            },

            updateData(){
                this.$Progress.start();
                //console.log('Update data');
                this.form.put('api/gtk/'+this.form.id)
                .then(() =>{
                    $('#tambah').modal('hide');
                    toast.fire({
                    icon: 'success',
                    title: 'Data Berhasil Diperbarui'
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
                    title: 'Pilih data terlebih dahulu? klik pada nama GURU',
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


            hapusdata(id){

                if(this.selectdata == 0) {
                    swal.fire({
                    title: 'Pilih data terlebih dahulu? klik pada tabel GURU',
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
                        this.form.delete('api/gtk/'+id).then(()=>{
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
            loadGTK(){
                axios.get("api/gtk").then(({ data }) => (this.gtk = data));
            },

            CreateData(){
                this.$Progress.start();
                this.form.post('api/gtk')
                .then(()=>{
                Fire.$emit('RefreshData');
                $('#tambah').modal('hide');

                toast.fire({
                icon: 'success',
                title: 'GTK Berhasil Ditambahkan'
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
                axios.get('api/cariGTK?q=' + kata).then((data) => {
                    this.gtk = data.data
                }).catch(() => {
                    swal.fire({
                    type: 'error',
                    title: 'WOOPS SOMETING WHENT WRONG',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                    });
                })
            })

            this.loadGTK();
            //setInterval(() => this.loadsiswa(), 3000)
            Fire.$on('RefreshData',()=> {
                this.loadGTK();
            });
        }
    }

</script>

