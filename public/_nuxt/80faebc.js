(window.webpackJsonp=window.webpackJsonp||[]).push([[5],{177:function(t,e,n){"use strict";n.r(e);var o={props:{value:{type:Boolean,default:!1}},data:function(){return{items:[{icon:"mdi-home-outline",title:"Home",to:"/"},{icon:"mdi-tag-multiple-outline",title:"Link 1",to:"#"},{icon:"mdi-store",title:"Link 2",to:"#"},{icon:"mdi-information-outline",title:"About us",to:"#"}],secretItems:[{icon:"mdi-account",title:"My Account",to:"#"}]}}},r=n(56),c=n(70),l=n.n(c),d=n(502),v=n(107),f=n(208),m=n(135),h=n(209),_=n(101),w=n(503),x=n(504),component=Object(r.a)(o,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-navigation-drawer",{attrs:{value:t.value,app:"",fixed:"",temporary:"","z-index":"999999"},on:{input:function(e){return t.$emit("input",e)}}},[n("v-list",{attrs:{nav:"",outlined:""}},t._l(t.items,(function(e){return n("v-list-item",{key:e.title,attrs:{to:e.to,router:"",exact:""}},[n("v-list-item-action",[n("v-icon",[t._v(t._s(e.icon))])],1),t._v(" "),n("v-list-item-content",[n("v-list-item-title",{domProps:{textContent:t._s(e.title)}})],1)],1)})),1),t._v(" "),n("v-divider"),t._v(" "),t.$auth.loggedIn?n("v-list",[n("v-subheader",[t._v("Business")]),t._v(" "),t._l(t.secretItems,(function(e){return n("v-list-item",{key:e.title,attrs:{to:e.to,router:"",exact:""}},[n("v-list-item-action",[n("v-icon",[t._v(t._s(e.icon))])],1),t._v(" "),n("v-list-item-content",[n("v-list-item-title",{domProps:{textContent:t._s(e.title)}})],1)],1)}))],2):t._e()],1)}),[],!1,null,null,null);e.default=component.exports;l()(component,{VDivider:d.a,VIcon:v.a,VList:f.a,VListItem:m.a,VListItemAction:h.a,VListItemContent:_.a,VListItemTitle:_.b,VNavigationDrawer:w.a,VSubheader:x.a})},217:function(t,e,n){"use strict";var o=n(2),r=n(228);n(483);e.a=function(t){var e=t.app;o.a.use(r.q,{vuetify:e.vuetify,iconsGroup:"md"})}},262:function(t,e,n){var content=n(349);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,n(14).default)("7388ab72",content,!0,{sourceMap:!1})},273:function(t,e,n){var content=n(404);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,n(14).default)("43caa93c",content,!0,{sourceMap:!1})},317:function(t,e,n){"use strict";n(20),n(71);var o=n(23),r={components:{desktopView:function(){return Promise.resolve().then(n.bind(null,318))},mobileView:function(){return Promise.resolve().then(n.bind(null,319))}},data:function(){return{update:!1}},mounted:function(){this.checkPWAUpdate()},methods:{checkPWAUpdate:function(){var t=this;return Object(o.a)(regeneratorRuntime.mark((function e(){var n;return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,window.$workbox;case 2:(n=e.sent)&&n.addEventListener("installed",(function(e){console.log("installed",e),e.isUpdate&&(t.update=!0,console.log("update needed"))}));case 4:case"end":return e.stop()}}),e)})))()},reloadWindow:function(){window.location.reload(!0)}},computed:{currentComponent:function(){return this.$vuetify.breakpoint.mdAndUp?"desktopView":"mobileView"}}},c=n(56),l=n(70),d=n.n(l),v=n(500),f=n(108),m=n(501),component=Object(c.a)(r,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-app",[n(t.currentComponent,{tag:"component"}),t._v(" "),n("v-snackbar",{model:{value:t.update,callback:function(e){t.update=e},expression:"update"}},[t._v("\n    New Update Available\n    "),n("v-btn",{attrs:{text:"",color:"primary"},on:{click:function(e){return t.reloadWindow()}}},[t._v("Update Now")])],1)],1)}),[],!1,null,null,null);e.a=component.exports;d()(component,{VApp:v.a,VBtn:f.a,VSnackbar:m.a})},318:function(t,e,n){"use strict";n.r(e);n(20);var o={name:"desktopView",prefetch:!1,data:function(){return{drawer:!1}},components:{navDrawer:n(177).default,userMenu:function(){return n.e(1).then(n.bind(null,615))},desktopFooter:function(){return n.e(3).then(n.bind(null,616))}}},r=(n(403),n(56)),c=n(70),l=n.n(c),d=n(505),v=n(108),f=n(107),m=n(506),h=n(222),component=Object(r.a)(o,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("v-app-bar",{attrs:{"hide-on-scroll":"",app:"",light:"",color:"white","elevate-on-scroll":"",height:"70"}},[n("nuxt-link",{staticStyle:{"text-decoration":"none",color:"unset"},attrs:{to:"/"}},[n("h3",{staticClass:"primary--text"},[t._v("AcumenConnect")])]),t._v(" "),n("v-spacer"),t._v(" "),n("v-btn",{attrs:{text:"",color:"primary"}},[t._v("Home")]),t._v(" "),n("v-btn",{attrs:{text:"",color:"primary"}},[t._v("Explore")]),t._v(" "),t.$auth.loggedIn?[n("userMenu")]:n("v-btn",{staticClass:"glow rounded-lg",attrs:{dark:"",color:"#00acee",to:"/login"}},[n("v-icon",[t._v("login")]),t._v(" Get Started\n    ")],1)],2),t._v(" "),n("v-main",{staticStyle:{"min-height":"100vh"}},[n("nuxt")],1),t._v(" "),n("desktopFooter"),t._v(" "),n("navDrawer",{model:{value:t.drawer,callback:function(e){t.drawer=e},expression:"drawer"}})],1)}),[],!1,null,null,null);e.default=component.exports;l()(component,{VAppBar:d.a,VBtn:v.a,VIcon:f.a,VMain:m.a,VSpacer:h.a})},319:function(t,e,n){"use strict";n.r(e);n(20);var o={name:"mobileView",data:function(){return{drawer:!1,title:"Ownear.dev"}},components:{bottomNav:function(){return n.e(2).then(n.bind(null,617))},navDrawer:n(177).default,userMenu:function(){return n.e(1).then(n.bind(null,615))}}},r=n(56),c=n(70),l=n.n(c),d=n(500),v=n(505),f=n(108),m=n(107),h=n(506),_=n(222),component=Object(r.a)(o,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-app",[n("v-app-bar",{attrs:{"hide-on-scroll":"","elevate-on-scroll":"",height:"70",app:"",color:"white"}},[n("v-btn",{attrs:{color:"black",icon:""},on:{click:function(e){e.stopPropagation(),t.drawer=!t.drawer}}},[n("v-icon",[t._v("mdi-sort-variant")])],1),t._v(" "),n("nuxt-link",{attrs:{to:"/"}},[n("h4",[t._v("LOGO")])]),t._v(" "),n("v-spacer"),t._v(" "),this.$auth.loggedIn?n("userMenu"):n("v-btn",{attrs:{icon:"",to:"/login"}},[n("v-icon",[t._v("mdi-login")])],1)],1),t._v(" "),n("v-main",[n("nuxt")],1),t._v(" "),n("navDrawer",{model:{value:t.drawer,callback:function(e){t.drawer=e},expression:"drawer"}}),t._v(" "),n("bottomNav",{directives:[{name:"show",rawName:"v-show",value:t.$vuetify.breakpoint.smAndDown,expression:"$vuetify.breakpoint.smAndDown"}]})],1)}),[],!1,null,null,null);e.default=component.exports;l()(component,{VApp:d.a,VAppBar:v.a,VBtn:f.a,VIcon:m.a,VMain:h.a,VSpacer:_.a})},327:function(t,e,n){n(328),t.exports=n(329)},348:function(t,e,n){"use strict";n(262)},349:function(t,e,n){var o=n(13)(!1);o.push([t.i,"h1[data-v-bfedb7fe]{font-size:20px}",""]),t.exports=o},354:function(t,e,n){var content=n(355);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,n(14).default)("aaec6fdc",content,!0,{sourceMap:!1})},355:function(t,e,n){var o=n(13)(!1);o.push([t.i,"body::-webkit-scrollbar{width:.5em!important}body::-webkit-scrollbar-track{box-shadow:inset 0 0 6px rgba(0,0,0,.3)}body::-webkit-scrollbar-thumb{background-color:#00acee;border-radius:60px}",""]),t.exports=o},403:function(t,e,n){"use strict";n(273)},404:function(t,e,n){var o=n(13)(!1);o.push([t.i,".glow{box-shadow:0 10px 20px -10px #00acee!important}",""]),t.exports=o},412:function(t,e,n){"use strict";n.r(e),n.d(e,"state",(function(){return o}));var o=function(){return{image_url:"http://acumen.test/storage"}}},97:function(t,e,n){"use strict";var o={layout:"empty",props:{error:{type:Object,default:null}},data:function(){return{pageNotFound:"404 Not Found",otherError:"An error occurred"}},head:function(){return{title:404===this.error.statusCode?this.pageNotFound:this.otherError}}},r=(n(348),n(56)),c=n(70),l=n.n(c),d=n(500),component=Object(r.a)(o,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-app",{attrs:{dark:""}},[404===t.error.statusCode?n("h1",[t._v("\n    "+t._s(t.pageNotFound)+"\n  ")]):n("h1",[t._v("\n    "+t._s(t.otherError)+"\n  ")]),t._v(" "),n("NuxtLink",{attrs:{to:"/"}},[t._v("\n    Home page\n  ")])],1)}),[],!1,null,"bfedb7fe",null);e.a=component.exports;l()(component,{VApp:d.a})}},[[327,29,6,30]]]);