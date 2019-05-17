<style>
    @media screen and (max-width: 768px) {
      .menu-toggle{
        background: white !important;
      }

       #menu-btn{
         background:gainsboro;
       }

       #respMenu li:hover>.sub-menu{
        display: block !important;
       }

       #row-1565870735{
           display: none;
       }
       
      }

</style>
<div class="section-content relative">
    <div class="row row-small" id="row-2047269185">
        <div class="col col-lg-8 col-sm-8 col-12 " style="margin-top:-100px">
            <div class="col-inner">
               @include('home.top.slide')
            </div>
        </div>
        <div class="col hide-for-small col-lg-4 col-sm-4 col-4">
            @include('home.top.left-contain')
        </div>
        <div class="col small-12 large-12">
            <div class="col-inner">
                <div class="gap-element" style="display:block; height:auto; padding-top:15px"></div>
            </div>
        </div>
        <style scope="scope">
        </style>
    </div>
    <div class="row" id="row-1565870735">
        @include('home.top.bot-contain')
    </div>
</div>