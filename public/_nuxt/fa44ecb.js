(window.webpackJsonp=window.webpackJsonp||[]).push([[22,13],{525:function(e,t,n){"use strict";n.r(t);n(87);var o=n(532);console.log("checkSystemRequirements"),console.log(JSON.stringify(o.ZoomMtg.checkSystemRequirements())),o.ZoomMtg.setZoomJSLib("https://source.zoom.us/1.7.10/lib","/av"),o.ZoomMtg.preLoadWasm(),o.ZoomMtg.prepareJssdk();var r={name:"ZoomFrame",data:function(){return{src:"",meetConfig:{},signature:{}}},props:{nickname:String,meetingId:String,password:String},created:function(){var e=this;this.meetConfig={apiKey:"lSTa_G9XQyW4zEVjj7Nd9Q",apiSecret:"qT25Zzhh35FGH6EGng61fDHgdep1ujvR78Yy",meetingNumber:this.meetingId,userName:this.nickname,passWord:this.password,leaveUrl:"https://zoom.us",role:0},this.signature=o.ZoomMtg.generateSignature({meetingNumber:this.meetConfig.meetingNumber,apiKey:this.meetConfig.apiKey,apiSecret:this.meetConfig.apiSecret,role:this.meetConfig.role,success:function(e){console.log("success signature: "+e.result)}}),o.ZoomMtg.init({leaveUrl:"http://www.zoom.us",isSupportAV:!0,success:function(){o.ZoomMtg.join({meetingNumber:e.meetConfig.meetingNumber,userName:e.meetConfig.userName,signature:e.signature,apiKey:e.meetConfig.apiKey,userEmail:"email@gmail.com",passWord:e.meetConfig.passWord,success:function(e){console.log("join meeting success")},error:function(e){console.log(e)}})},error:function(e){console.log(e)}})},mounted:function(){}},c=n(56),component=Object(c.a)(r,(function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)}),[function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"iframe-container"},[n("meta",{attrs:{charset:"utf-8"}}),e._v(" "),n("link",{attrs:{type:"text/css",rel:"stylesheet",href:"https://source.zoom.us/1.7.9/css/bootstrap.css"}}),e._v(" "),n("link",{attrs:{type:"text/css",rel:"stylesheet",href:"https://source.zoom.us/1.7.9/css/react-select.css"}}),e._v(" "),n("meta",{attrs:{name:"format-detection",content:"telephone=no"}})])}],!1,null,null,null);t.default=component.exports},535:function(e,t,n){var content=n(570);"string"==typeof content&&(content=[[e.i,content,""]]),content.locals&&(e.exports=content.locals);(0,n(14).default)("e02f341e",content,!0,{sourceMap:!1})},569:function(e,t,n){"use strict";n(535)},570:function(e,t,n){var o=n(13)(!1);o.push([e.i,".container-zoom{width:70%;height:100%}",""]),e.exports=o},623:function(e,t,n){"use strict";n.r(t);var o={name:"app",data:function(){return{nickname:"",meetingId:"",password:""}},components:{ZoomFrame:n(525).default},created:function(){this.nickname=this.$route.query.nickname,this.meetingId=this.$route.query.meetingId,this.password=this.$route.query.password}},r=(n(569),n(56)),component=Object(r.a)(o,(function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"meeting"},[n("div",{staticClass:"container-zoom"},[n("ZoomFrame",{attrs:{nickname:e.nickname,meetingId:e.meetingId,password:e.password}})],1)])}),[],!1,null,null,null);t.default=component.exports;installComponents(component,{ZoomFrame:n(525).default})}}]);