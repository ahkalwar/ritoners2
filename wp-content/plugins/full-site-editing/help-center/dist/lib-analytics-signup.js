"use strict";(self.webpackChunkwebpack=self.webpackChunkwebpack||[]).push([[874,474],{11901:function(n,e,t){t.d(e,{f:function(){return a}});var i=t(7369),o=t(1444),r=t(36190),s=t(33675),c=t(30214);t(28122);async function a(){if(await(0,i.Z)(),(0,o.Z)()){if(await(0,c._)(),r.xb){const n=["event","conversion",{send_to:r.Hb.wpcomGoogleAdsGtagRegistration}];(0,r.fF)("adTrackRegistration: [Google Ads Gtag]",n),window.gtag(...n)}if(r._O){const n=["trackSingle",r.Hb.facebookInit,"Lead"];(0,r.fF)("adTrackRegistration: [Facebook]",n),window.fbq(...n)}if(r.n_){const n={ec:"registration"};(0,r.fF)("adTrackRegistration: [Bing]",n),window.uetq.push(n)}if(r.ZK&&((0,r.fF)("adTrackRegistration: [Floodlight]"),(0,s.j)({send_to:"DC-6355556/wordp0/regis0+unique"})),r.eG){const n=["track","lead"];(0,r.fF)("adTrackRegistration: [Pinterest]",n),window.pintrk(...n)}(0,r.fF)("adTrackRegistration: dataLayer:",JSON.stringify(window.dataLayer,null,2))}else(0,r.fF)("adTrackRegistration: [Skipping] ad tracking is not allowed")}},76297:function(n,e,t){t.d(e,{Z:function(){return p}});var i=t(36115),o=t(88767),r=t(7369),s=t(1444),c=t(39161),a=t(36190),u=t(33675),d=t(30214);t(28122);async function p(n){let{isNewUserSite:e}=n;if(await(0,r.Z)(),!(0,s.Z)())return void(0,a.fF)("adTrackSignupComplete: [Skipping] ad tracking is disallowed");if(await(0,d._)(),a.ZK&&((0,a.fF)("adTrackSignupComplete: Floodlight:"),(0,u.j)({send_to:"DC-6355556/wordp0/signu0+unique"})),!e)return;const t={is_signup:!0,currency:"USD",total_cost:0,products:[{is_signup:!0,product_id:"new-user-site",product_slug:"new-user-site",product_name:"new-user-site",currency:"USD",volume:1,cost:0}]},p=(0,i.ts)(),l="s_"+(0,o.Z)().replace(/-/g,""),g=(0,c.Z)(t.total_cost,t.currency);if(a.xb){const n=["event","conversion",{send_to:a.Hb.wpcomGoogleAdsGtagSignup,value:t.total_cost,currency:t.currency,transaction_id:l}];(0,a.fF)("recordSignup: [Google Ads Gtag]",n),window.gtag(...n)}if(a.n_)if(null!==g){const n={ec:"signup",gv:g};(0,a.fF)("recordSignup: [Bing]",n),window.uetq.push(n)}else(0,a.fF)("recordSignup: [Bing] currency not supported, dropping WPCom pixel");if(a._O){const n=["trackSingle",a.Hb.facebookInit,"Subscribe",{product_slug:t.products.map((n=>n.product_slug)).join(", "),value:t.total_cost,currency:t.currency,user_id:p?p.hashedPii.ID:0,order_id:l}];(0,a.fF)("recordSignup: [Facebook]",n),window.fbq(...n)}if(a.ZK&&((0,a.fF)("recordSignup: [Floodlight]"),(0,u.j)({send_to:"DC-6355556/wordp0/signu1+unique"})),a.kL){const n={qacct:a.Hb.quantcast,labels:"_fp.event.WordPress Signup,_fp.pcat."+t.products.map((n=>n.product_slug)).join(" "),orderid:l,revenue:g,event:"refresh"};(0,a.fF)("recordSignup: [Quantcast]",n),window._qevents.push(n)}if(a.hR&&((0,a.fF)("recordSignup: [Icon Media]",a.yf),(new window.Image).src=a.yf),a.eG){const n=["track","signup",{value:t.total_cost,currency:t.currency}];(0,a.fF)("recordSignup: [Pinterest]",n),window.pintrk(...n)}if(a.Mf){const n=["track","Signup",{}];(0,a.fF)("recordSignup: [Twitter]",n),window.twq(...n)}(0,a.fF)("recordSignup: dataLayer:",JSON.stringify(window.dataLayer,null,2))}},30530:function(n,e,t){t.d(e,{j:function(){return u}});var i=t(36115),o=t(7369),r=t(1444),s=t(36190),c=t(33675),a=t(30214);t(28122);async function u(n){if(await(0,o.Z)(),!(0,r.Z)())return void(0,s.fF)("adTrackSignupStart: [Skipping] ad tracking is not allowed");await(0,a._)();const e=(0,i.ts)();if(s.ZK&&((0,s.fF)("adTrackSignupStart: [Floodlight]"),(0,c.j)({send_to:"DC-6355556/wordp0/pre-p0+unique"})),s.ZK&&!e&&"onboarding"===n&&((0,s.fF)("adTrackSignupStart: [Floodlight]"),(0,c.j)({send_to:"DC-6355556/wordp0/landi00+unique"})),s.xb&&!e&&"onboarding"===n){const n=["event","conversion",{send_to:s.Hb.wpcomGoogleAdsGtagSignupStart}];(0,s.fF)("adTrackSignupStart: [Google Ads Gtag]",n),window.gtag(...n)}}},11209:function(n,e,t){t.r(e),t.d(e,{recordAliasInFloodlight:function(){return s}});var i=t(1444),o=t(36190),r=t(33675);t(28122);function s(){(0,i.Z)()&&o.ZK&&((0,o.fF)("recordAliasInFloodlight: Aliasing anonymous user id with WordPress.com user id"),(0,o.fF)("recordAliasInFloodlight:"),(0,r.j)({send_to:"DC-6355556/wordp0/alias0+standard"}))}},51953:function(n,e,t){t.d(e,{$:function(){return a}});var i=t(36115),o=t(38049),r=t.n(o),s=t(11209);const c=r()("calypso:analytics:identifyUser");function a(n){(0,i.$A)(n);const e=(0,i.ts)();"object"==typeof n&&e&&(0,i.di)()&&(c("recordAliasInFloodlight",e),(0,s.recordAliasInFloodlight)())}},48528:function(n,e,t){t.r(e),t.d(e,{recordSignupStart:function(){return f},recordSignupComplete:function(){return w},recordSignupStep:function(){return S},recordSignupInvalidStep:function(){return D},recordRegistration:function(){return F},recordSignupProcessingScreen:function(){return v},recordSignupPlanChange:function(){return k}});var i=t(79321),o=t(38049),r=t.n(o),s=t(30530),c=t(76297),a=t(11901),u=t(46272),d=t(44567),p=t(51953),l=t(38602),g=t(17032);const _=r()("calypso:analytics:signup");function f(n,e,t){(0,g.recordTracksEvent)("calypso_signup_start",{flow:n,ref:e,...t}),(0,d.Yh)("Signup","calypso_signup_start"),(0,s.j)(n),(0,u.K)("calypso_signup_start",{flow:n,ref:e,...t})}function w(n,e){let{flow:t,siteId:o,isNewUser:r,isBlankCanvas:s,hasCartItems:a,isNew7DUserSite:p,theme:_,intent:f,startingPoint:w}=n;const S=!!o;if(!e)return(0,l.x)("signup","recordSignupComplete",{flow:t,siteId:o,isNewUser:r,isBlankCanvas:s,hasCartItems:a,isNew7DUserSite:p,theme:_,intent:f,startingPoint:w},!0);(0,g.recordTracksEvent)("calypso_signup_complete",{flow:t,blog_id:o,is_new_user:r,is_new_site:S,is_blank_canvas:s,has_cart_items:a,theme:_,intent:f,starting_point:w});const D=[r&&"is_new_user",S&&"is_new_site",a&&"has_cart_items"].filter(Boolean);if((0,d.Yh)("Signup","calypso_signup_complete:"+D.join(",")),p){const n=(0,i.jv)();(0,g.recordTracksEvent)("calypso_new_user_site_creation",{flow:t,device:n}),(0,d.Yh)("Signup","calypso_new_user_site_creation"),(0,u.K)("calypso_new_user_site_creation",{flow:t,device:n})}(0,c.Z)({isNewUserSite:r&&S}),(0,u.K)("calypso_signup_complete",{flow:t,blog_id:o,is_new_user:r,is_new_site:S,is_blank_canvas:s,has_cart_items:a,theme:_,intent:f,starting_point:w})}function S(n,e,t){const o={flow:n,step:e,device:(0,i.jv)(),...t};_("recordSignupStep:",o),(0,g.recordTracksEvent)("calypso_signup_step_start",o),(0,u.K)("calypso_signup_step_start",o)}function D(n,e){(0,g.recordTracksEvent)("calypso_signup_goto_invalid_step",{flow:n,step:e})}function F(n){let{userData:e,flow:t,type:o}=n;const r=(0,i.jv)();_("recordRegistration:",{userData:e,flow:t,type:o}),(0,p.$)(e),(0,g.recordTracksEvent)("calypso_user_registration_complete",{flow:t,type:o,device:r}),(0,d.Yh)("Signup","calypso_user_registration_complete"),(0,a.f)(),(0,u.K)("calypso_user_registration_complete",{flow:t,type:o,device:r})}function v(n,e,t){const o=(0,i.jv)();(0,g.recordTracksEvent)("calypso_signup_processing_screen_show",{flow:n,previous_step:e,device:o,...t})}const k=(n,e,t,o,r,s)=>{const c=(0,i.jv)();(0,g.recordTracksEvent)("calypso_signup_plan_change",{flow:n,step:e,device:c,previous_plan_name:t,previous_plan_slug:o,current_plan_name:r,current_plan_slug:s})}},39161:function(n,e,t){t.d(e,{Z:function(){return o}});const i={AED:3.673181,AFN:77.277444,ALL:110.685,AMD:485.718536,ANG:1.857145,AOA:318.1145,ARS:42.996883,AUD:1.39546,AWG:1.801247,AZN:1.7025,BAM:1.73465,BBD:2,BDT:84.350813,BGN:1.7345,BHD:.377065,BIF:1829.456861,BMD:1,BND:1.350704,BOB:6.910218,BRL:3.825491,BSD:1,BTC:.000188070491,BTN:69.241,BWP:10.571,BYN:2.12125,BZD:2.01582,CAD:1.331913,CDF:1640.538151,CHF:1.002295,CLF:.024214,CLP:662.405194,CNH:6.718409,CNY:6.7164,COP:3102.756403,CRC:603.878956,CUC:1,CUP:25.75,CVE:98.34575,CZK:22.699242,DJF:178,DKK:6.620894,DOP:50.601863,DZD:119.094464,EGP:17.321,ERN:14.996695,ETB:28.87,EUR:.886846,FJD:2.135399,FKP:.763495,GBP:.763495,GEL:2.695,GGP:.763495,GHS:5.18885,GIP:.763495,GMD:49.5025,GNF:9126.453332,GTQ:7.6503,GYD:207.888008,HKD:7.83635,HNL:24.53,HRK:6.587,HTG:84.642,HUF:285.120971,IDR:14140.665178,ILS:3.57935,IMP:.763495,INR:69.1502,IQD:1190,IRR:42105,ISK:119.899897,JEP:.763495,JMD:129.28,JOD:.709001,JPY:110.9875,KES:101.11,KGS:68.708365,KHR:4021.592884,KMF:437.375,KPW:900,KRW:1137.899434,KWD:.304268,KYD:.833459,KZT:378.893401,LAK:8630.377846,LBP:1509.5,LKR:174.733735,LRD:164.499779,LSL:14.1,LYD:1.391411,MAD:9.622,MDL:17.513226,MGA:3642.597503,MKD:54.731723,MMK:1510.092364,MNT:2511.632328,MOP:8.07298,MRO:357,MRU:36.55,MUR:34.9505,MVR:15.424994,MWK:728.565,MXN:18.8201,MYR:4.1106,MZN:64.576343,NAD:14.11,NGN:360.105269,NIO:33.04,NOK:8.49614,NPR:110.785702,NZD:1.47776,OMR:.38502,PAB:1,PEN:3.294475,PGK:3.374968,PHP:51.872601,PKR:141.62807,PLN:3.79605,PYG:6186.225628,QAR:3.641793,RON:4.217807,RSD:104.64086,RUB:64.2743,RWF:904.135,SAR:3.75,SBD:8.21464,SCR:13.675964,SDG:47.613574,SEK:9.261891,SGD:1.351801,SHP:.763495,SLL:8390,SOS:578.545,SRD:7.458,SSP:130.2634,STD:21050.59961,STN:21.8,SVC:8.751385,SYP:514.993308,SZL:13.972654,THB:31.75,TJS:9.434819,TMT:3.509961,TND:3.0117,TOP:2.267415,TRY:5.683728,TTD:6.768744,TWD:30.840434,TZS:2315.252864,UAH:26.819481,UGX:3758.198709,USD:1,UYU:33.969037,UZS:8427.57062,VEF:248487.642241,VES:3305.47961,VND:23197.866398,VUV:111.269352,WST:2.607815,XAF:581.732894,XAG:.06563851,XAU:76444e-8,XCD:2.70255,XDR:.717354,XOF:581.732894,XPD:71959e-8,XPF:105.828888,XPT:.00110645,YER:250.35,ZAR:13.909458,ZMW:12.110083,ZWL:322.355011};function o(n,e){return function(n){return-1!==Object.keys(i).indexOf(n)}(e)?(n/i[e]).toFixed(3):null}}}]);
//# sourceMappingURL=lib-analytics-signup.js.map