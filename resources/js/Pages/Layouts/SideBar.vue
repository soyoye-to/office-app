<template>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow expanded" data-scroll-to-active="true" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        <div class="navbar-header expanded">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="../../../html/ltr/vertical-menu-template-bordered/index.html">
                        <img src="/app-assets/images/crownbirth.jpeg" width="40px" height="40px" style="border-radius:50%;" alt="clogo">
                        <h2 class="brand-text">Crownbirth Ltd</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x d-block d-xl-none text-primary toggle-icon font-medium-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-disc d-none d-xl-block collapse-toggle-icon primary font-medium-4"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="3"></circle></svg></a></li>
            </ul>
        </div>
        <div class="shadow-bottom" style="display: block;"></div>
        <div class="main-menu-content ps ps--active-y">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item"><a class="d-flex align-items-center" href="/dashboard">
                    <i class="fas fa-home icon-color"></i>Dashboard
                </a>
                </li>
                 <div class="lines"></div>
                <!-- <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                </li> -->
                 <li v-for="(menu,i) in side_menu" :key="i" class="nav-item" :class="{'has_sub': menu.sub_menu.length}">

                    <a class="d-flex align-items-center" :href="menu.sub_menu.length < 1 ? menu.link : '#'">
                        <i class="fas" :class="menu.icon"></i>{{menu.title}}
                    </a>
                    <ul v-if="menu.sub_menu.length" class="menu-content ">
                        <li   v-for="(sub_m, i) in menu.sub_menu" :key="i" :class="{'nav-item':i !=0, 'has_sub':sub_m.sub_menu_2.length}" >
                             <inertia-link class="d-flex align-items-center" :href="sub_m.sub_menu_2.length < 1 ? sub_m.link : '#'">
                                 <i class="fas" :class="sub_m.icon"></i>
                                <span class="menu-title text-truncate"  data-i18n="Chat">{{sub_m.title}}</span>
                            </inertia-link>
                             <ul v-if="sub_m.sub_menu_2.length" class="menu-content">
                                <li v-for="(sub_m2, i) in sub_m.sub_menu_2" :key="i">
                                    <inertia-link class="d-flex align-items-center" :href="sub_m2.link" target="_blank">
                                        <i class="fas" :class="sub_m2.icon"></i>
                                        <span class="menu-item text-truncate" data-i18n="LoginV1">   {{sub_m2.title}}</span>
                                    </inertia-link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <div class="lines"></div>
                </li>
                <div class="lines"></div>
            </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: -132px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 132px; height: 767px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 54px; height: 319px;"></div></div></div>
    </div>

              
</template>

<script>
export default {
    data() {
        return {
            side_menu:[]
        }
    },
    methods :{
      getMenu(){
           axios.get('menu')
                .then(res=>{
                  this.side_menu = res.data;
                //   console.log(this.side_menu);
                }).catch(err=>{
                  
                })
            }
    },
    mounted(){
        this.getMenu()
    }
}
</script>

<style scoped>
.lines{
    border-bottom: rgba(157, 255, 96, 0.479) solid 1px;
    margin: 0 20px 0 20px;
}
.icon-color{
    color: #6e6b7bb9;
}
</style>

