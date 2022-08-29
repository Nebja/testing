<template>
 <p>  {{ trans.Hello }}</p>
 <p>{{ trans.newmsg}}</p>
  <p>{{ trans.frmsg}}</p>
</template>

<script>
export default {
  name: "home",
  data() {
    return{
      trans: ''
    }
  },
  mounted() {
    this.trans = JSON.parse(document.getElementById("app").getAttribute('trans'))
    console.log(this.trans)
    console.log('hello')
  }
}
</script>

<style scoped>

</style>