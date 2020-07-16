<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
        <!-- header -->
          <div class="card-header">
            <h4 class="card-title">Data Rombel</h4>
            <div class="card-tools">
                  <button class="btn btn-sm btn-outline-success" @click="newModal">
                    <i class="fa fa-user-plus">&nbsp;Tambah</i></button>
              </div>

              <div class="card-tools mr-2">
                  <button class="btn btn-sm btn-outline-info" @click="editModal()">
                    <i class="fa fa-edit ">&nbsp;Ubah</i></button>
              </div>

              <div class="card-tools mr-2">
                  <button class="btn btn-sm btn-outline-danger" @click="hapusdata(form.id)">
                      <i class="fa fa-trash ">&nbsp;Hapus</i></button>
              </div>


              <div class="card-tools mr-2">
                  <button class="btn btn-sm btn-warning" @click="ModalAnggota">
                      <i class="fa fa-user-graduate ">&nbsp;Angota Rombel</i></button>
              </div>

            <!-- end header -->
          </div>
        <!-- card body -->
        <div class="card-body">
          <div class="table-responsive-xl">
          <table class="table table-hover table-sm">
            <thead class="table-light">
              <tr>
                <th>JENIS ROMBEL</th>
                <th>TINGKAT PENDIDIKAN</th>
                <th>PROGAM PENGAJARAN</th>
                <th>NAMA ROMBEL</th>
                <th>WALI KELAS</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="rombel in rombels.data" @click="selectRow(rombel)" :key="rombel.id" :class="{'pilihtr' : selectdata == rombel.id }">
                <td>{{rombel.jenis_rombel}}</td>
                <td>{{rombel.tingkat_pendidikan}}</td>
                <td>{{rombel.kejuruan}}</td>
                <td>{{rombel.nama_rombel}}</td>
                <td>{{rombel.wali_kelas}}</td>
              </tr>
            </tbody>
          </table>
        </div>

          <!-- end card body -->
        </div>
        <div class="card-footer">
            <pagination size="small" align="right" :data="rombels" @pagination-change-page="getResults"></pagination>
        </div>
          <!-- modal anggota -->
        <div class="modal fade bd-example-modal-lg" id="Anggota" tabindex="-1" role="dialog" aria-labelledby="AnggotaLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="AnggotaLabel">Anggota Rombel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="row">
              <div class="col-lg-9">
                    <h5>Data Rombel Kelas</h5>
                </div>
                <div class="col mr-3">

                  <button class="btn btn-danger btn-sm" @click="keluarkan(tempid)">
                    <i class="fa">&nbsp;keluarkan</i></button>
                  <button class="btn btn-success btn-sm" @click="addSiswa()">
                    <i class="fa fa-user-plus">&nbsp;Tambah</i></button>

                </div>

              </div>
            <div class="row">

              <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="table-responsive-xl table-wrapper-scroll-y my-custom-scrollbar">
                  <table class="table table-borderless table-sm">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>NAMA</th>
                        <th>NIPD</th>
                        <th>NISN</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="siswa in anggota.data" @click="selectList(siswa)" :key="siswa.id" :class="{'pilihtr' : rombeldata == siswa.id }">
                            <td></td>
                            <td>{{siswa.nama_siswa | Upper}}</td>
                            <td>{{siswa.NIPD}}</td>
                            <td>{{siswa.NISN}}</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </section>
              <section class="col-lg-6 connectedSortable ui-sortable">
                  <div class="table-responsive-xl table-wrapper-scroll-y my-custom-scrollbar">
                  <table class="table table-borderless table-sm">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>NAMA</th>
                        <th>NIPD</th>
                        <th>NISN</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="siswa in siswas.data" @click="siswaList(siswa)" :key="siswa.id" :class="{'pilihtr' : siswadata == siswa.id }">
                            <td></td>
                            <td>{{siswa.nama | Upper}}</td>
                            <td>{{siswa.NIPD}}</td>
                            <td>{{siswa.NISN}}</td>
                        </tr>
                    </tbody>
                  </table>

                </div>
              </section>
            </div>
            <div class="card-footer">
              <section class="col-lg-6 ">
              </section>
              <section class="col-lg-6 ">
                <pagination size="small" align="right" :data="siswas" @pagination-change-page="getResults"></pagination>
              </section>
            </div>
            </div>
        </div>
        </div>
        <!-- end modal anggota -->

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" v-show="!editMode" id="tambahLabel">Tambah Data Rombongan Belajar</h5>
                <h5 class="modal-title" v-show="editMode" id="tambahLabel">Edit data Rombongan Belajar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editMode ? updateData() : CreateData()">
                <div class="modal-body">
                  <div class="form-group row">
                  <label for="jenis_rombel" class="col-sm-2 col-form-label">Jenis Rombel</label>
                  <div class="col-sm-10">
                    <select v-model="form.jenis_rombel" name="jenis_rombel" id="jenis_rombel"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('jenis_rombel') }">
                        <option value="Kelas">Kelas</option>
                        <option value="Terbuka">Kelas Terbuka</option>
                    </select>
                  </div>
                  </div>

                  <div class="form-group row">
                    <label for="tingkat_pendidikan" class="col-sm-2 col-form-label">Tingkat Pendidikan</label>
                    <div class="col-sm-10">
                    <v-select v-model="form.tingkat_pendidikan" :options="['10', '11','12']" id="tingkat_pendidikan"
                    :class="{ 'is-invalid': form.errors.has('tingkat_pendidikan') }">
                    </v-select>
                    <has-error :form="form" field="tingkat_pendidikan"></has-error>
                  </div>
                  </div>

                  <div class="form-group row">
                    <label for="kejuruan" class="col-sm-2 col-form-label">Program Pengajaran</label>
                    <div class="col-sm-10">
                    <v-select v-model="form.kejuruan" :options="['MIPA', 'IPS']" id="kejuruan"
                    :class="{ 'is-invalid': form.errors.has('kejuruan') }"></v-select>
                    <has-error :form="form" field="kejuruan"></has-error>
                  </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama_rombel" class="col-sm-2 col-form-label">Nama Rombel</label>
                    <div class="col-sm-10">
                    <input v-model="form.nama_rombel" type="text" name="nama_rombel"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('nama_rombel') }">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="wali_kelas" class="col-sm-2 col-form-label">Wali Kelas</label>
                    <div class="col-sm-10">
                    <v-select v-model="form.wali_kelas" :options="gtk.data" :reduce="option => option.nama" label="nama"
                        :class="{ 'is-invalid': form.errors.has('wali_kelas') }">
                      <template slot="option" slot-scope="option">
                          {{ option.nama }}
                      </template>
                    </v-select>
                    <has-error :form="form" field="wali_kelas"></has-error>
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
        <!-- end Modal -->

        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data(){
        return{
          editMode: false,
          rombeldata: 0,
          selectdata: 0,
          siswadata: 0,
          rombels : {},
          anggota: {},
          siswas : {},
          gtk:{},
          tempid:{},
          form: new Form({
            id: '',
            jenis_rombel : '',
            tingkat_pendidikan:'',
            kejuruan:'',
            nama_rombel: '',
            wali_kelas: '',
            id_rombel: '',
            siswa:{},
          })

        }
      },

      methods: {

        ModalAnggota(){
          if (this.selectdata == 0){
              swal.fire({
                text: 'Pilih data terlebih dahulu? klik pada data rombel',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
                })
          } else {
              Fire.$emit('LoadKelas');
              $('#Anggota').modal('show');
          }
        },
        //list siswa dalam rombel
        selectList(list){
          (this.rombeldata = list.id);
          (this.tempid = list)
        },

        // keluarkan dari rombel
        keluarkan(data){
          if(this.rombeldata == 0) {
              swal.fire({
              text: 'Pilih data terlebih dahulu? klik pada data anggota rombel',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK'
              })
            } else {
              swal.fire({
              text: "Anda yakin ingin mengeluarkan siswa dari rombel?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'OK'
              }).then((result)=>{
                if(result.value) {
                  axios.post('api/delanggota?id=' + data.id, data)
                  .then(()=>{
                    Fire.$emit('LoadKelas');
                  }).catch(()=>{
                      swal.fire('Gagal', 'Data gagal dikeluarkan.', 'warning')
                  })
                }
              })
            }
        },

        // btn add siswa
        addSiswa(){
          this.form.post('api/kelas')
          Fire.$emit('LoadKelas');
        },

        //list siswa
        siswaList(list){
          (this.siswadata = list.id);
          //console.log(list)
          (this.form.siswa = list);
        },

        selectRow(data){
          (this.selectdata = data.id)
          //console.log('klik', data.id)
          this.form.reset();
          this.form.clear();
          this.form.fill(data);
        },

        getResults(page = 1){
          axios.get('api/rombel?page=' + page)
          .then(response => {this.gtk = response.data;});
        },

        loadkelas(){
          axios.get('api/anggota?id=' + this.form.id_rombel).then((data) => (this.anggota = data));
          axios.get('api/nonrombel').then(({data}) => (this.siswas = data));
        },

        loaddata(){
          axios.get("api/rombel").then(({data}) => (this.rombels = data));
          axios.get("api/gtk").then(({ data }) => (this.gtk = data));
        },

        newModal(){
            this.editMode = false;
            this.form.reset();
            $('#Modal').modal('show');
        },

        editModal(user){
            if(this.selectdata == 0) {
              swal.fire({
              text: 'Pilih data terlebih dahulu? klik pada data rombel',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK'
              })
            } else {
              this.editMode = true;
              $('#Modal').modal('show');
            }
        },

        updateData(){
            this.$Progress.start();
            this.form.put('api/rombel/'+ this.form.id)
            .then(()=>{
                $('#Modal').modal('hide');
                toast.fire({
                  icon: 'success',
                  title: 'Rombel Berhaisl Ditambahkan'
                });
                Fire.$emit('RefreshData');
                this.$Progress.finish();
            }).catch(()=>{
                toast.fire({
                  icon: 'error',
                  title: 'Gagal Update data'
                });
                this.$Progress.fail();
            });
            //console.log('update data');
        },

        hapusdata(id){
          if(this.selectdata == 0) {
              swal.fire({
              text: 'Pilih data terlebih dahulu? klik pada data rombel',
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
              }).then((result)=>{
                  this.form.delete('api/rombel/'+ id)
                  .then(()=>{
                    swal.fire(
                      'Data berhasil dihapus.'
                    )
                  }).catch(()=>{
                      swal.fire('Gagal', 'Data gagal dihapus.', 'warning')
                  })
              })
            }
        },

        CreateData(){
            this.$Progress.start();
            this.form.post('api/rombel')
            .then(()=>{
                Fire.$emit('RefreshData');
                $('#Modal').modal('hide');
                toast.fire({
                    icon: 'success',
                    title: 'Rombel Berhaisl Ditambahkan'
                });
                this.$Progress.finish();
            }).catch(()=>{
                toast.fire({
                    icon: 'error',
                    title: 'Gagal Menambahkan Data'
                });
                this.$Progress.fail();
            })
        },



        // end methods
      },


      created() {
          this.loaddata();
          Fire.$on('RefreshData', ()=> {
            this.loaddata();
          });
          Fire.$on('LoadKelas', ()=>{
            this.loadkelas();
          });
      }
    }
</script>
