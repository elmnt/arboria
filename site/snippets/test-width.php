<style>
#checkw {
  position: fixed !important;
  top: 100px;
  left: 10px;
  border: 2px solid red;
  background: yellow;
  color: red;
  padding: 10px 20px;
  z-index: 9999;
}
</style>
<script type="text/javascript">
$(window).on("load resize scroll",function(e){
  var wdw  = $( window ).width();
  var cpos = $( '#elmobile' ).position();
  $("#checkw").html( wdw + '<br>' + cpos.left );
});
</script>
<div id="checkw"></div>
