(self.webpackChunkwebpack=self.webpackChunkwebpack||[]).push([[583],{50706:function(e,t,o){"use strict";o.r(t);var s=o(38049),n=o.n(s),i=o(17768),c=o.n(i),r=o(94002);const a=n()("calypso:happychat:connection");class p{init(e,t){return this.openSocket?(a("socket is already connected"),this.openSocket):(this.dispatch=e,this.openSocket=new Promise(((o,s)=>{t.then((t=>{let{url:n,user:{signer_user_id:i,jwt:a,locale:p,groups:u,skills:l,geoLocation:h}}=t;const d=(e=>"string"==typeof e?new(c())(e,{transports:["websocket"]}):e)(n);d.once("connect",(()=>e((0,r.id)()))).on("token",(t=>{e((0,r.wH)()),t({signer_user_id:i,jwt:a,locale:p,groups:u,skills:l})})).on("init",(()=>{e((0,r.k_)({signer_user_id:i,locale:p,groups:u,skills:l,geoLocation:h})),e((0,r.bi)()),o(d)})).on("unauthorized",(()=>{d.close(),e((0,r.up)("User is not authorized")),s("user is not authorized")})).on("disconnect",(t=>e((0,r.nv)(t)))).on("reconnecting",(()=>e((0,r.Mo)()))).on("status",(t=>e((0,r.KX)(t)))).on("accept",(t=>e((0,r.pL)(t)))).on("localized-support",(t=>e((0,r.$W)(t)))).on("message",(t=>e((0,r.QM)(t)))).on("message.optimistic",(t=>e((0,r.dN)(t)))).on("message.update",(t=>e((0,r.gg)(t)))).on("reconnect_attempt",(()=>{d.io.opts.transports=["polling","websocket"]}))})).catch((e=>s(e)))})),this.openSocket)}send(e){if(this.openSocket)return this.openSocket.then((t=>t.emit(e.event,e.payload)),(t=>(this.dispatch((0,r.Mx)("failed to send "+e.event+": "+t)),Promise.reject(t))))}request(e,t){if(this.openSocket)return this.openSocket.then((o=>{const s=Promise.race([new Promise(((t,s)=>{o.emit(e.event,e.payload,((e,o)=>e?s(new Error(e)):t(o)))})),new Promise(((e,o)=>setTimeout((()=>o(new Error("timeout"))),t)))]);return s.then((t=>this.dispatch(e.callback(t))),(t=>{"timeout"!==t.message&&this.dispatch((0,r.Mx)(e.event+" request failed: "+t.message))})),s}),(t=>(this.dispatch((0,r.Mx)("failed to send "+e.event+": "+t)),Promise.reject(t))))}}t.default=()=>new p},18864:function(){}}]);
//# sourceMappingURL=async-load-calypso-lib-happychat-connection.js.map