<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="row">
            <section class="col-lg-7 connectedSortable ui-sortable">
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pengaturan pengguna</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                Gunakan Tombol di bawah ini untuk membuka menu pengelolaan pengguna aplikasi
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="card-tools">
                    <button class="bt btn-outline-success" @click="newModal">
                    <i class="fa fa-users">Management Pengguna</i></button>
              </div>
              </div>
            </div>
            </section>

            <section class="col-lg-5 connectedSortable ui-sortable">
            </section>
            <!-- end row -->
          </div>
          <!-- end Col -->
        </div>

        <!-- modal -->
        <div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"  id="tambahLabel">Tambah Data Guru Dan Tenaga Pendidik</h5>
                  
                  <div class="col-sm-4">
                    <!-- <select v-model="form" class="form-control" id="slname" name="slname">
                      <option v-for="data in gtk.data" :value="data">{{ data.nama }}</option>
                    </select> -->
                    <v-select v-model="form" :options="gtk.data" label="nama" >
                      <template slot="option" slot-scope="option" v-for="data in gtk.data" :value="data">
                          {{ option.nama }}
                      </template>
                    </v-select>
                  </div>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <form @submit.prevent="createdata(form)">
              
                <!-- modal Body -->
                <div class="modal-body">
                  <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" v-model="form.nama" name="nama" class="form-control">
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="nama" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" v-model="form.email" name="email" class="form-control">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="tgl_lahir" class="col-sm-2 col-form-label">password</label>
                      <div class="col-sm-10">
                        <input type="password" v-model="form.tgl_lahir" name="tgl_lahir" class="form-control" 
                        >
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="type" class="col-sm-2 col-form-label">Jabatan</label>
                      <div class="col-sm-10">
                        <select type="text" v-model="form.type" name="type" class="form-control" >
                          <option value="admin" >admin/Kepala Sekolah</option>
                          <option value="guru" >Wakil Kepala Sekolah</option>
                          <option value="bendahara" >Bendahara</option>
                          <option value="guru" >Guru Mapel</option>
                          <option value="TU" >Staff Pendidikan</option>
                        </select>
                      </div>
                  </div>
                 <!-- Modal Footer -->
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-outline-danger">BUAT USER</button>
                  </div>
                 <!-- end modal body -->
                </div>

              </form>
            </div>
          </div>
        </div>

        <!-- end modal -->

    </div>
    <!-- end Container -->
  </div>
</template>

<script>
import Vue from 'vue'
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
    export default {
      data() {
            return {
              gtk:{},
              form: new Form({
                id : '',
                nama : '',
                email : '',
                jenis_kelamin: '',
                tempat_lahir : '',
                tgl_lahir : '',
                alamat: '',
                telp: '',
                jabatan: '',
                gtk_id: '',
                jabatan:'',
                type:'',
                
              }),
            }
      },

    methods:{

      createdata(user){
        axios.post('api/reg', user)
        //console.log('data', user)
      },

        newModal(){
                $('#tambah').modal('show');
            },

      loadGTK(){
          axios.get("api/gtk").then(({ data }) => (this.gtk = data));
      }
    },

      created() {
        this.loadGTK();
      },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
