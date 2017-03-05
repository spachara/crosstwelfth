(function($) {


    $.organicTabs = function(el, options) {
    
        var base = this;
        base.$el = $(el);
        base.$nav = base.$el.find(".nav");
                
        base.init = function() {
        
            base.options = $.extend({},$.organicTabs.defaultOptions, options);
            
            // Accessible hiding fix
            $(".hide").css({
                "position": "relative",
                "top": 0,
                "left": 0,
                "display": "none"
            }); 
            
            base.$nav.delegate("li > a", "click", function() {
            
                // Figure out current list via CSS class
                var curList = base.$el.find("a.current").attr("href").substring(1),
                
                // List moving to
                    $newList = $(this),
                    
                // Figure out ID of new list
                    listID = $newList.attr("href").substring(1),
                
                // Set outer wrapper height to (static) height of current inner list
                    $allListWrap = base.$el.find(".list-wrap"),
                    curListHeight = $allListWrap.height();
                $allListWrap.height(curListHeight);
                                        
                if ((listID != curList) && ( base.$el.find(":animated").length == 0)) {
                                            
                    // Fade out current list
                    base.$el.find("#"+curList).fadeOut(base.options.speed, function() {
                        
                        // Fade in new list on callback
                        base.$el.find("#"+listID).fadeIn(base.options.speed);
                        
                        // Adjust outer wrapper to fit new list snuggly
                        var newHeight = base.$el.find("#"+listID).height();
                        $allListWrap.animate({
                            height: newHeight
                        });
                        
                        // Remove highlighting - Add to just-clicked tab
                        base.$el.find(".nav li a").removeClass("current");
                        $newList.addClass("current");
						
						
                            
                    });
                    
                }   
                
                // Don't behave like a regular link
                // Stop propegation and bubbling
                return false;
				
            });
            
        };
        base.init();
    };
    
    $.organicTabs.defaultOptions = {
		
        "speed": 300
    };
    
    $.fn.organicTabs = function(options) {
        return this.each(function() {
            (new $.organicTabs(this, options));
        });
    };
    
})(jQuery);







/*******************************************************************************************************************************/
(function($) {


    $.organicTabs2 = function(el, options) {
    
        var base2 = this;
        base2.$el = $(el);
        base2.$nav = base2.$el.find(".nav2");
                
        base2.init = function() {
        
            base2.options = $.extend({},$.organicTabs2.defaultOptions, options);
            
            // Accessible hiding fix
            $(".hide2").css({
                "position": "relative",
                "top": 0,
                "left": 0,
                "display": "none"
            }); 
            
            base2.$nav.delegate("li > a", "click", function() {
            
                // Figure out current list via CSS class
                var curList = base2.$el.find("a.current2").attr("href").substring(1),
                
                // List moving to
                    $newList = $(this),
                    
                // Figure out ID of new list
                    listID = $newList.attr("href").substring(1),
                
                // Set outer wrapper height to (static) height of current inner list
                    $allListWrap = base2.$el.find(".list-wrap2"),
                    curListHeight = $allListWrap.height();
                $allListWrap.height(curListHeight);
                                        
                if ((listID != curList) && ( base2.$el.find(":animated").length == 0)) {
                                            
                    // Fade out current list
                    base2.$el.find("#"+curList).fadeOut(base2.options.speed, function() {
                        
                        // Fade in new list on callback
                        base2.$el.find("#"+listID).fadeIn(base2.options.speed);
                        
                        // Adjust outer wrapper to fit new list snuggly
                        var newHeight = base2.$el.find("#"+listID).height();
                        $allListWrap.animate({
                            height: newHeight
                        });
                        
                        // Remove highlighting - Add to just-clicked tab
                        base2.$el.find(".nav2 li a").removeClass("current2");
                        $newList.addClass("current2");
                            
                    });
                    
                }   
                
                // Don't behave like a regular link
                // Stop propegation and bubbling
                return false;
				
            });
            
        };
        base2.init();
    };
    
    $.organicTabs2.defaultOptions = {
		
        "speed": 300
    };
    
    $.fn.organicTabs2 = function(options) {
        return this.each(function() {
            (new $.organicTabs2(this, options));
        });
    };
    
})(jQuery);

/*******************************************************************************************************************************/
