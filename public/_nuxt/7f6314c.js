(window.webpackJsonp=window.webpackJsonp||[]).push([[2],{519:function(t,o,n){"use strict";var e=n(57);o.a=e.a.extend({name:"button-group",provide:function(){return{btnToggle:this}},computed:{classes:function(){return e.a.options.computed.classes.call(this)}},methods:{genData:e.a.options.methods.genData}})},537:function(t,o,n){var content=n(587);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,n(14).default)("404bd0ac",content,!0,{sourceMap:!1})},586:function(t,o,n){"use strict";n(537)},587:function(t,o,n){var e=n(13)(!1);e.push([t.i,".v-btn--contained{min-width:70px!important}.v-btn--contained span{font-size:.75rem!important;font-weight:500}.v-btn--contained .v-icon:before{font-size:25px!important}",""]),t.exports=e},588:function(t,o,n){var content=n(589);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,n(14).default)("5ea6d85e",content,!0,{sourceMap:!1})},589:function(t,o,n){var e=n(13)(!1);e.push([t.i,".theme--light.v-bottom-navigation{background-color:#fff;color:rgba(0,0,0,.87)}.theme--light.v-bottom-navigation .v-btn:not(.v-btn--active){color:rgba(0,0,0,.6)!important}.theme--dark.v-bottom-navigation{background-color:#2e2e2e;color:#fff}.theme--dark.v-bottom-navigation .v-btn:not(.v-btn--active){color:hsla(0,0%,100%,.7)!important}.v-item-group.v-bottom-navigation{bottom:0;display:flex;left:0;justify-content:center;width:100%;box-shadow:0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12)}.v-item-group.v-bottom-navigation .v-btn{background-color:transparent;border-radius:0;box-shadow:none;flex:0 1 auto;font-size:.75rem;height:inherit;max-width:168px;min-width:80px;position:relative;text-transform:none}.v-item-group.v-bottom-navigation .v-btn:after{content:none}.v-item-group.v-bottom-navigation .v-btn .v-btn__content{flex-direction:column-reverse;height:inherit}.v-item-group.v-bottom-navigation .v-btn .v-btn__content>:not(.v-icon){line-height:1.2}.v-item-group.v-bottom-navigation .v-btn.v-btn--active{color:inherit}.v-item-group.v-bottom-navigation .v-btn.v-btn--active:not(:hover):before{opacity:0}.v-item-group.v-bottom-navigation--absolute,.v-item-group.v-bottom-navigation--fixed{z-index:4}.v-item-group.v-bottom-navigation--absolute{position:absolute}.v-item-group.v-bottom-navigation--active{transform:translate(0)}.v-item-group.v-bottom-navigation--fixed{position:fixed}.v-item-group.v-bottom-navigation--grow .v-btn{width:100%}.v-item-group.v-bottom-navigation--horizontal .v-btn>.v-btn__content{flex-direction:row-reverse}.v-item-group.v-bottom-navigation--horizontal .v-btn>.v-btn__content>.v-icon{margin-bottom:0;margin-right:16px}.v-item-group.v-bottom-navigation--shift .v-btn .v-btn__content>:not(.v-icon){opacity:0;position:absolute;top:calc(100% - 12px);transform:scale(.9);transition:.3s cubic-bezier(.25,.8,.5,1)}.v-item-group.v-bottom-navigation--shift .v-btn--active .v-btn__content>.v-icon{transform:translateY(-8px)}.v-item-group.v-bottom-navigation--shift .v-btn--active .v-btn__content>:not(.v-icon){opacity:1;top:calc(100% - 22px);transform:scale(1)}",""]),t.exports=e},617:function(t,o,n){"use strict";n.r(o);var e={data:function(){return{bottomNav:""}}},r=(n(586),n(56)),v=n(70),c=n.n(v),l=(n(17),n(144),n(3)),m=(n(588),n(167)),h=n(519),f=n(18),d=n(116),x=n(118),y=n(210),_=n(15),w=n(37),O=n(5),k=n(9);function j(object,t){var o=Object.keys(object);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(object);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(object,t).enumerable}))),o.push.apply(o,n)}return o}function S(t){for(var i=1;i<arguments.length;i++){var source=null!=arguments[i]?arguments[i]:{};i%2?j(Object(source),!0).forEach((function(o){Object(l.a)(t,o,source[o])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(source)):j(Object(source)).forEach((function(o){Object.defineProperty(t,o,Object.getOwnPropertyDescriptor(source,o))}))}return t}var V=Object(O.a)(Object(m.a)("bottom",["height","inputValue"]),f.a,d.a,Object(w.b)("inputValue"),x.a,y.a,_.a).extend({name:"v-bottom-navigation",props:{activeClass:{type:String,default:"v-btn--active"},backgroundColor:String,grow:Boolean,height:{type:[Number,String],default:56},hideOnScroll:Boolean,horizontal:Boolean,inputValue:{type:Boolean,default:!0},mandatory:Boolean,shift:Boolean},data:function(){return{isActive:this.inputValue}},computed:{canScroll:function(){return y.a.options.computed.canScroll.call(this)&&(this.hideOnScroll||!this.inputValue)},classes:function(){return{"v-bottom-navigation--absolute":this.absolute,"v-bottom-navigation--grow":this.grow,"v-bottom-navigation--fixed":!this.absolute&&(this.app||this.fixed),"v-bottom-navigation--horizontal":this.horizontal,"v-bottom-navigation--shift":this.shift}},styles:function(){return S(S({},this.measurableStyles),{},{transform:this.isActive?"none":"translateY(100%)"})}},created:function(){this.$attrs.hasOwnProperty("active")&&Object(k.a)("active.sync","value or v-model",this)},methods:{thresholdMet:function(){this.isActive=!this.isScrollingUp,this.$emit("update:input-value",this.isActive)},updateApplication:function(){return this.$el?this.$el.clientHeight:0},updateValue:function(t){this.$emit("change",t)}},render:function(t){var data=this.setBackgroundColor(this.backgroundColor,{staticClass:"v-bottom-navigation",class:this.classes,style:this.styles,props:{activeClass:this.activeClass,mandatory:Boolean(this.mandatory||void 0!==this.value),value:this.internalValue},on:{change:this.updateValue}});return this.canScroll&&(data.directives=data.directives||[],data.directives.push({arg:this.scrollTarget,name:"scroll",value:this.onScroll})),t(h.a,this.setTextColor(this.color,data),this.$slots.default)}}),z=n(108),B=n(107),component=Object(r.a)(e,(function(){var t=this,o=t.$createElement,n=t._self._c||o;return n("v-bottom-navigation",{attrs:{app:"","hide-on-scroll":"",color:"primary",value:t.bottomNav,mandatory:""},model:{value:t.bottomNav,callback:function(o){t.bottomNav=o},expression:"bottomNav"}},[n("v-btn",{attrs:{to:"/",exact:"",value:"home"}},[n("span",[t._v("Home")]),t._v(" "),n("v-icon",[t._v("mdi-home")])],1),t._v(" "),n("v-btn",{attrs:{to:"#1",value:"link1"}},[n("span",[t._v("Link 1")]),t._v(" "),n("v-icon",[t._v("mdi-package-variant")])],1),t._v(" "),n("v-btn",{attrs:{to:"#2",value:"link2"}},[n("span",[t._v("Link 2")]),t._v(" "),n("v-icon",[t._v("mdi-heart")])],1),t._v(" "),n("v-btn",{attrs:{to:"#3",value:"link3"}},[n("span",[t._v("Link 3")]),t._v(" "),n("v-icon",[t._v("mdi-shopping")])],1)],1)}),[],!1,null,null,null);o.default=component.exports;c()(component,{VBottomNavigation:V,VBtn:z.a,VIcon:B.a})}}]);