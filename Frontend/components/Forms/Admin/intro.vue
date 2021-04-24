<template>
<div>

        </div>
</template>

<script>
export default {
  layout: "adminDesktop",
  data: () => ({
    title: "",
    cover_image: "",
    desc_1: "",
    desc_2: "",
    intro_video_desc: "",
    introduction: "",
    school_name: "",
    intro_video_link: "",
    program: [],
    loading: true,
    orientation: {},
    live_session: {},
    visit: {},
    certificate: {},
    submitting: false
  }),
  computed:{
    form: ()=>{
      var vm=this;
      return vm.$store.state.admin.intro.form;
    }
  },
  created() {
    console.log(this.$store.state.admin.intro.form);
  },
  methods: {

    updateProgram() {
      this.submitting = true;
      console.log(e);
    },
    replaceCoverImage(e, oldImg, index) {
      let image = e.target.files[0];
      e.target.value = "";
      if (image === null) {
        return;
      }
      let formdata = new FormData();
      formdata.append("image", image);
      formdata.append("path", "domains/");
      formdata.append("delete", oldImg);
      this.$axios
        .post(`images/replace`, formdata, {
          headers: { "Content-type": "multipart/form-data" }
        })
        .then(
          res => {
            this.domains[index].image = res.data.image;
          },
          err => {}
        );
    }
  }
};
</script>
