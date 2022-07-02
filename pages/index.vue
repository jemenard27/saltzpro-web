<template>
  <div>
    <card-page-selection></card-page-selection>
  </div>
</template>

<script>
export default {
  name: 'IndexPage',
  mounted() {
    this.isLoginUser()
  }
}
</script>