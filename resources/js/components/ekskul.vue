<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Data Ekskul</h4>
            <div class="card-tools">
              <button class="btn btn-sm btn-outline-success" @click="newModal">
              <i class="fa fa-user-plus">&nbsp;Tambah</i></button>
            </div>
            <div class="card-tools mr-2">
              <button class="btn btn-sm btn-outline-info" @click="editModal()">
              <i class="fa fa-edit">&nbsp;Ubah</i></button>
            </div>
            <div class="card-tools mr-2">
              <button class="btn btn-sm btn-outline-danger" @click="hapusdata(form.id)">
              <i class="fa fa-trash ">&nbsp;Hapus</i></button>
            </div>
            <div class="card-tools mr-2">
              <button class="btn btn-sm btn-warning" @click="ModalAnggota">
              <i class="fa fa-user-graduate ">&nbsp;Angota Rombel</i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
            <div class="table-responsive-xl">
                <table class="table table-hover table-sm">
                  <thead class="thead-light">
                    <tr>
                      <th>#</th>
                      <th>JENIS EKSKUL</th>
                      <th>NAMA EKSKUL</th>
                      <th>PEMBINA</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr v-for="ekskul in ekskuls.data" @click="selectRow(ekskul)" :key="ekskul.id" :class="{'pilihtr' : selectdata == ekskul.id }">
                    <td></td>
                    <td>{{ ekskul.jenis_ekskul }}</td>
                    <td>{{ ekskul.nama_ekskul }}</td>
                    <td>{{ ekskul.pembina | Upper}}</td>
                  </tr>
                  </tbody>
                </table>
            </div>
            </div>
          </div>
        <!-- modal anggota -->

        <div class="modal fade bd-example-modal-lg" id="Anggota" tabindex="-1" role="dialog" aria-labelledby="AnggotaLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="AnggotaLabel">Anggota Ekstrakurikuler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="row">
              <div class="col-lg-9">
                </div>
                <div class="col mr-3">
                  <button class="btn btn-danger btn-sm" @click="keluarkan(tempdata)">
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

        <!-- modal -->
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
                    <label for="jenis_ekskul" class="col-sm-2 col-form-label">Jenis Ekskul</label>
                    <div class="col-sm-10">
                    <input v-model="form.jenis_ekskul" type="text" name="jenis_ekskul"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('jenis_ekskul') }">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama_ekskul" class="col-sm-2 col-form-label">Nama Ekskul</label>
                    <div class="col-sm-10">
                    <input v-model="form.nama_ekskul" type="text" name="nama_ekskul"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('nama_ekskul') }">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pembina" class="col-sm-2 col-form-label">Pembina Ekskul</label>
                    <div class="col-sm-10">
                    <input v-model="form.pembina" type="text" name="pembina"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('pembina') }">
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button v-show="editMode" type="submit" class="btn btn-success">UPDATE</button>
                    <button v-show="!editMode" type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
              </form>
            </div>
        </div>
        </div>
        <!-- end modal -->

          <!-- end card -->
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
          rombeldata:0,
          selectdata:0,
          siswadata:0,
          anggota:{},
          ekskuls:{},
          siswas:{},
          tempdata:{},
          form: new Form({
            id:'',
            jenis_ekskul: '',
            nama_ekskul: '',
            pembina: '',
            siswa:{},

          })
        }

      },

      methods: {
        selectList(list){
          (this.rombeldata = list.id);
          (this.tempdata = list);
        },

        siswaList(list){
          (this.siswadata = list.id);
          (this.form.siswa = list);
        },

        selectRow(data){
          (this.selectdata = data.id);
          this.form.reset();
          this.form.clear();
          this.form.fill(data);
        },

        addSiswa(){
          this.form.post('api/anggotaekskul')
          Fire.$emit('LoadEkskul');

        },

        keluarkan(data){
        if(this.rombeldata == 0) {
            swal.fire({
            text: 'Pilih data terlebih dahulu? klik pada data anggota ekskul',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
            })
          } else {
            swal.fire({
            text: "Anda yakin ingin mengeluarkan siswa dari ekskul?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
            }).then((result)=>{
              if(result.value) {
                axios.post('api/delekskul?id=' + data.id, data)
                .then(()=>{
                  Fire.$emit('LoadEkskul');
                }).catch(()=>{
                    swal.fire('Gagal', 'Data gagal dikeluarkan.', 'warning')
                })
              }
            })
          }
        },

        CreateData(){
          this.$Progress.start();
          this.form.post('api/ekskul')
          .then(()=>{
              Fire.$emit('RefreshData');
              $('#Modal').modal('hide');
              toast.fire({
                  icon: 'success',
                  title: 'Ekstra Berhaisl Ditambahkan'
              });
              this.$Progress.finish();
          }).catch(()=>{
              toast.fire({
                  icon: 'error',
                  title: 'Gagal Menambahkan Ekstra'
              });
              this.$Progress.fail();
          })
        },

        editModal(){
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
          this.form.put('api/ekskul/'+ this.form.id)
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
                this.form.delete('api/ekskul/'+ id)
                .then(()=>{
                  Fire.$emit('RefreshData');
                  swal.fire(
                    'Data berhasil dihapus.'
                  )
                }).catch(()=>{
                    swal.fire('Gagal', 'Data gagal dihapus.', 'warning')
                })
            })
          }
        },

        ModalAnggota(){
          Fire.$emit('LoadEkskul');
          $('#Anggota').modal('show');
        },

        newModal(){
          $('#Modal').modal('show');
        },

        loadanggota(){
          axios.get('api/loadekskul?id=' + this.form.id).then((data) => (this.anggota = data));
          axios.get('api/nonekskul').then(({data}) => (this.siswas = data));
        },

        loaddata(){
          axios.get('api/ekskul').then(({data}) => (this.ekskuls = data))
        }
      },
        created() {
          this.loaddata();
          Fire.$on('RefreshData', ()=> {
            this.loaddata();
          });
          Fire.$on('LoadEkskul', ()=>{
              this.loadanggota();
          });
        }
    }
</script>
