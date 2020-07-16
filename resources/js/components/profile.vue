<style>
.widget-profile-header{
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
    height: 235px;
    padding: 1rem;
    text-align: center;
    background-position: center center;
    background-size: cover;
}

</style>

<template >
    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-profile-header text-white" style="background-image:url('/picture/bg.jpg')" v-for="profile in profiles" :key="profile.id">
                <h3 class="widget-user-username text-right">{{profile.nama | balok}}</h3>
                <h5 class="widget-user-desc text-right">{{user.email | depan}}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" :src="fotoprofile()" alt="User Image">
              </div>
              <div class="card-footer">
                <div class="row">
                    <div class="card-header p-2 col-md-12">
                        <ul class="nav nav-pills nav-fill">
                        <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Profile Data</a></li>

                        <li v-if="user.type == 'siswa' || user.type == 'superuser' " class="nav-item"><a class="nav-link" href="#updatedata" 
                        v-for="pro in profiles" :key="pro.id" @click="selectRow(pro)" data-toggle="tab">Biodata</a></li>

                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
        </div>
            <!-- bodi profile -->

            <div class="card" >
              <div class="card-body">
                <div class="tab-content" >
                                        <!-- aktifitas -->
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                            <h4>Profile</h4>
                        <!-- /.post -->
                            <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem repellat sequi quas, nobis molestiae omnis laborum error corporis odit amet nemo aut harum aliquam enim temporibus. Ipsa omnis natus amet.</span>
                        <!-- Post -->

                        <!-- /.post -->

                        <!-- Post -->

                        <!-- /.post -->
                    </div>
                                        <!-- update data -->
                    <div class="tab-pane" id="updatedata">
                            <!-- Post -->
                                <h4>BIODATA</h4>

                            <!-- /.post -->
                            <!-- test -->

                    <form @submit.prevent="editMode ? updateData(profile.id) : CreateData()">
                        <div class="form-group">
                        <input v-model="profile.nama" type="text" name="nama" placeholder="Nama Lengkap"
                            class="form-control">

                        </div>

                        <div class="form-group">
                        <input v-model="profile.NIPD" type="number" name="NIPD" placeholder="NIPD"
                            class="form-control">

                        </div>

                        <div class="form-group">
                        <select v-model="profile.jenis_kelamin" class="form-control" name="jenis_kelamin">
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                        </select>
                        </div>

                        <div class="form-group">
                        <input v-model="profile.NISN" type="text" name="NISN" placeholder="NISN"
                            class="form-control">

                        </div>

                        <div class="form-group">
                        <input v-model="profile.tempat_lahir" type="text" name="tempat_lahir" placeholder="Tempat Lahir"
                            class="form-control" >

                        </div>

                        <div class="form-group">
                        <div class="input-group">

                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>

                            <input v-model="profile.tgl_lahir" type="date" name="tgl_lahir" class="form-control"
                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                            placeholder="dd/mm/yyyy" data-mask>

                        </div>
                        </div>

                        <div class="form-group">
                        <input v-model="profile.NIK" type="number" name="NIK" placeholder="NIK"
                            class="form-control" >

                        </div>

                        <div class="form-group">
                        <select v-model="profile.agama" class="form-control" name="agama">
                                <option>Islam</option>
                                <option>Hindu</option>
                                <option>Kristen</option>
                                <option>Katholik</option>
                                <option>Kong Hu Chu</option>
                        </select>
                        </div>

                        <div class="form-group">
                        <textarea v-model="profile.alamat" class="form-control" name="alamat" placeholder="Alamat Lengkap" rows="3"
                        >
                                    </textarea>

                        </div>

                        <div class="form-group">
                        <input v-model="profile.telp" type="number" name="telp" placeholder="No Telephone"
                            class="form-control" >

                        </div>
                            <!-- Form Ayah -->
                        <div class="form-group">
                            <label for="nama_ayah">Biodata Ayah</label>
                        <input v-model="profile.nama_ayah" type="text" name="nama_ayah" placeholder="Nama Ayah"
                            class="form-control" >

                        </div>

                        <div class="form-group">
                        <input v-model="profile.thn_lahir_ayah" type="number" name="thn_lahir_ayah" placeholder="Tahun Lahir"
                            class="form-control" >

                        </div>

                        <div class="form-group">
                        <input v-model="profile.kerja_ayah" type="text" name="kerja_ayah" placeholder="Kerja Ayah"
                            class="form-control" >
                        </div>

                        <div class="form-group">
                        <input v-model="profile.NIK_ayah" type="number" name="NIK_ayah" placeholder="NIK Ayah"
                            class="form-control" >

                        </div>

                        <div class="form-group">
                        <input v-model="profile.Telp_ayah" type="number" name="Telp_ayah" placeholder="No Telephone Ayah"
                            class="form-control" >

                        </div>

                        <div class="form-group">
                            <label for="nama_Ibu">Biodata Ibu</label>
                            <input v-model="profile.nama_ibu" type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu"
                                    >

                        </div>

                        <div class="form-group">
                            <input v-model="profile.thn_lahir_ibu" type="number" name="thn_lahir_ibu" class="form-control" placeholder="Tahun Lahir Ibu">
                        </div>

                        <div class="form-group">
                            <input v-model="profile.kerja_ibu" type="text" name="kerja_ibu" class="form-control" placeholder="Kerja Ibu">
                        </div>

                        <div class="form-group">
                            <input v-model="profile.NIK_ibu" type="number" name="NIK_ibu" class="form-control" placeholder="NIK Ibu">
                        </div>

                        <div class="form-group">
                            <input v-model="profile.Telp_ibu" type="number" name="Telp_ibu" class="form-control" placeholder="No Telephone Ibu"
                                    >

                        </div>

                        <div class="form-group">
                        <select v-model="profile.Golongan" class="form-control" name="Golongan">
                                <option>Umum</option>
                                <option>Perwira</option>
                                <option>WAKAWURI</option>

                        </select>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" @click.prevent="updateData" class="btn btn-block btn-outline-success col-sm-2">SIMPAN</button>
                        </div>
                    </form>
                    </div>

                    <!-- setting -->
                    <div class="tab-pane" id="settings">
                    <form class="form-horizontal" >
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" v-model="user.name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="email" v-model="user.email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">password</label>
                            <div class="col-sm-10">
                            <input type="password" v-model="user.password" class="form-control">
                            </div>
                        </div>

                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                           <input type="file" @change="updatefoto" class="form-input">
                           <input type="hidden" v-model="user.photo" name="photo">
                        </div>
                    </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" @click.prevent="updateUser" class="btn btn-block btn-outline-success col-sm-2">Update</button>
                        </div>
                      </div>

                    </form>
                </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>

            </div>
</template>

<script>

    export default {
        data(){
            return{

                user : new Form({
                    id : '',
                    name: '',
                    email: '',
                    password: '',
                    photo: '',
                    type:'',
                }),
                profiles:{},
                profile : new Form({
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

                })
            }
        },

        filters: {
            balok : function (text) {
                if (!text) return ''
                text = text.toString()
                return text.toUpperCase();
                //return text.charAt(0).toUpperCase() + text.slice(1)
            },

            depan : function (text) {
                if (!text) return ''
                text = text.toString()
                //return text.toUpperCase();
                return text.charAt(0).toUpperCase() + text.slice(1)
            }
        },
        methods: {

          selectRow(data){
            this.profile.fill(data)
          },

            fotoprofile(){
                let photo = (this.user.photo.length > 200) ? this.user.photo : "picture/profile/"+ this.user.photo ;
                return photo;
                //return "picture/profile/"+ this.user.photo;
            },

            updatefoto(foto){
                //console.log('Upload data');
                let file = foto.target.files[0];
                console.log(file);
                let reader = new FileReader();
                if(file['size'] < 2697152){

                    reader.onloadend = (file) => {
                        console.log('RESULT', reader.result)
                        this.user.photo = reader.result;
                    }
                    reader.readAsDataURL(file);

                }else{
                    swal.fire({
                    type: 'error',
                    title: 'File terlalu besar MAX 2.5 Mb',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'batal'
                    });
                }
            },

            updateData(){
                this.$Progress.start();
                //console.log('Update data');
                this.profile.put('api/sisupdate')
                .then(() =>{
                    toast.fire({
                    icon: 'success',
                    title: 'Data Siswa Berhasil Diperbarui'
                    });
                    this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },

            updateUser(){
                this.$Progress.start();
                //console.log('Update data');
                this.user.put('api/userupdate')
                .then(() =>{
                    toast.fire({
                    icon: 'success',
                    title: 'Data user Berhasil Diperbarui'
                    });
                    Fire.$emit('Refreshfoto');
                    this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },

            loadprofile(){
            axios.get("api/user")
            .then(({ data }) => (this.user.fill(data)));
            axios.get("api/profile")
            .then(({ data }) => (this.profiles = data));
        },

        },


         mounted() {
             console.log('Component mounted.')
         },
        created() {
            this.loadprofile();

            Fire.$on('Refreshfoto',()=> {
                this.loadprofile();
            });
        }

    }
</script>
