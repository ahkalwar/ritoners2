!function(a,b,c){var d,e=b.event;e.special.smartresize={setup:function(){b(this).bind("resize",e.special.smartresize.handler)},teardown:function(){b(this).unbind("resize",e.special.smartresize.handler)},handler:function(a,b){var c=this,e=arguments;a.type="smartresize",d&&clearTimeout(d),d=setTimeout(function(){jQuery.event.handle.apply(c,e)},"execAsap"===b?0:100)}},b.fn.smartresize=function(a){return a?this.bind("smartresize",a):this.trigger("smartresize",["execAsap"])},b.Slideshow=function(a,c){this.$el=b(c),this.$list=this.$el.find("ul.ei-slider-large"),this.$imgItems=this.$list.children("li"),this.itemsCount=this.$imgItems.length,this.$images=this.$imgItems.find("img:first"),this.$sliderthumbs=this.$el.find("ul.ei-slider-thumbs").hide(),this.$sliderElems=this.$sliderthumbs.children("li"),this.$sliderElem=this.$sliderthumbs.children("li.ei-slider-element"),this.$thumbs=this.$sliderElems.not(".ei-slider-element"),this._init(a)},b.Slideshow.defaults={animation:"sides",autoplay:!1,slideshow_interval:3e3,speed:800,easing:"",titlesFactor:.6,titlespeed:800,titleeasing:"",thumbMaxWidth:150},b.Slideshow.prototype={_init:function(a){this.options=b.extend(!0,{},b.Slideshow.defaults,a),this.$imgItems.css("opacity",0),this.$imgItems.find("div.ei-title > *").css("opacity",0),this.current=0;var c=this;this.$loading=b('<div class="ei-slider-loading">Loading</div>').prependTo(c.$el),b.when(this._preloadImages()).done(function(){c.$loading.hide(),c._setImagesSize(),c._initThumbs(),c.$imgItems.eq(c.current).css({opacity:1,"z-index":10}).show().find("div.ei-title > *").css("opacity",1),c.options.autoplay&&c._startSlideshow(),c._initEvents()})},_preloadImages:function(){var a=this,c=0;return b.Deferred(function(d){a.$images.each(function(e){b("<img/>").load(function(){++c===a.itemsCount&&d.resolve()}).attr("src",b(this).attr("src"))})}).promise()},_setImagesSize:function(){this.elWidth=this.$el.width();var a=this;this.$images.each(function(c){var d=b(this);imgDim=a._getImageDim(d.attr("src")),d.css({width:imgDim.width,height:imgDim.height,marginLeft:imgDim.left,marginTop:imgDim.top})})},_getImageDim:function(a){var b=new Image;b.src=a;var c,d,e=this.elWidth,f=this.$el.height(),g=f/e,h=b.width,i=b.height,j=i/h;return g>j?(d=f,c=f/j):(d=e*j,c=e),{width:c,height:d,left:(e-c)/2,top:(f-d)/2}},_initThumbs:function(){this.$sliderElems.css({"max-width":this.options.thumbMaxWidth+"px",width:100/this.itemsCount+"%"}),this.$sliderthumbs.css("max-width",this.options.thumbMaxWidth*this.itemsCount+"px").show()},_startSlideshow:function(){var a=this;this.slideshow=setTimeout(function(){var b;b=a.current===a.itemsCount-1?0:a.current+1,a._slideTo(b),a.options.autoplay&&a._startSlideshow()},this.options.slideshow_interval)},_slideTo:function(a){if(a===this.current||this.isAnimating)return!1;this.isAnimating=!0;var c=this.$imgItems.eq(this.current),d=this.$imgItems.eq(a),e=this,f={zIndex:10},g={opacity:1};"sides"===this.options.animation&&(f.left=a>this.current?-1*this.elWidth:this.elWidth,g.left=0),d.find("div.ei-title > h2").css("margin-right","50px").stop().delay(this.options.speed*this.options.titlesFactor).animate({marginRight:"0px",opacity:1},this.options.titlespeed,this.options.titleeasing).end().find("div.ei-title > h3").css("margin-right","-50px").stop().delay(this.options.speed*this.options.titlesFactor).animate({marginRight:"0px",opacity:1},this.options.titlespeed,this.options.titleeasing),b.when(c.css("z-index",1).find("div.ei-title > *").stop().fadeOut(this.options.speed/2,function(){b(this).show().css("opacity",0)}),d.css(f).stop().animate(g,this.options.speed,this.options.easing),this.$sliderElem.stop().animate({left:this.$thumbs.eq(a).position().left},this.options.speed)).done(function(){c.css("opacity",0).find("div.ei-title > *").css("opacity",0),e.current=a,e.isAnimating=!1})},_initEvents:function(){var c=this;b(a).on("smartresize.eislideshow",function(a){c._setImagesSize(),c.$sliderElem.css("left",c.$thumbs.eq(c.current).position().left)}),this.$thumbs.on("click.eislideshow",function(a){c.options.autoplay&&(clearTimeout(c.slideshow),c.options.autoplay=!1);var d=b(this),e=d.index()-1;return c._slideTo(e),!1})}};var f=function(a){this.console};b.fn.eislideshow=function(a){if("string"==typeof a){var c=Array.prototype.slice.call(arguments,1);this.each(function(){var d=b.data(this,"eislideshow");return d&&b.isFunction(d[a])&&"_"!==a.charAt(0)?void d[a].apply(d,c):void f()})}else this.each(function(){b.data(this,"eislideshow")||b.data(this,"eislideshow",new b.Slideshow(a,this))});return this}}(window,jQuery);