<style>
    .loader-container{
        height: 100%;
        width:100%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        z-index: 999;
        background-color: #fff;
    }
    .loader {
    position: relative;
    width: 50px;
    height: 65px;
    background:rgb(255, 255, 255);
    border: 0.5px solid gray;
    border-radius: 4px;
  }
  .loader:before{
    content: '';
    position: absolute;
    width: 27px;
    height: 12.5px;
    left: 50%;
    top: 0;
    background-image:
    radial-gradient(ellipse at center, #0000 24%,#7173a6 25%,#7173a6 64%,#0000 65%),
    linear-gradient(to bottom, #0000 34%,#7173a6 35%);
    background-size: 12px 12px , 100% auto;
    background-repeat: no-repeat;
    background-position: center top;
    transform: translate(-50% , -65%);
    box-shadow: 0 -3px rgba(0, 0, 0, 0.25) inset;
  }
 .loader:after{
    content: '';
    position: absolute;
    left: 50%;
    top: 20%;
    transform: translateX(-50%);
    width: 66%;
    height: 60%;
    background: linear-gradient(to bottom, #9d9fe6 30%, #0000 31%);
    background-size: 100% 16px;
    animation: writeDown 2s ease-out infinite;
 }

 @keyframes writeDown {
    0% { height: 0%; opacity: 0;}
    20%{ height: 0%; opacity: 1;}
    80% { height: 65%; opacity: 1;}
    100% { height: 65%; opacity: 0;}
 }
      
</style>
<div class="loader-container">
    <span class="loader"></span>
</div>
<script>
    $(document).ready(function () {
        $('.loader-container').show();
        // setTimeout(function(){
        //     $('.loader-container').fadeOut();
        // },1000);
    });
    $(window).on('load', function () {
        $('.loader-container').fadeOut(1000);
    });
</script>