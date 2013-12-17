$(function() {

    $("#tabs").delegate("li > a", "click", function() {
            
        // Figure out current list via CSS class
        var curList = $("#tabs li a.current").attr("rel"),
        
        // List moving to
            $newList = $(this),
            
        // Figure out ID of new list
            listID = $newList.attr("rel"),
        
        // Set outer wrapper height to (static) height of current inner list
            $allListWrap = $("#tab_area"),
            curListHeight = $allListWrap.height();
        $allListWrap.height(curListHeight);
        console.log($newList);        
        if ((listID != curList) && ($(":animated").length == 0)) {
                    
            // Fade out current list
            $("#"+curList).fadeOut(300, function() {
                
                // Fade in new list on callback
                $("#"+listID).fadeIn();
                
                // Adjust outer wrapper to fit new list snuggly
                var newHeight = $("#"+listID).height();
                $allListWrap.animate({
                    height: newHeight
                });
                
                // Remove highlighting - Add to just-clicked tab
                $("#tabs li a").removeClass("current");
                $("#tabs li a").addClass("not_current");
                $newList.removeClass("not_current");
                $newList.addClass("current");
                    
            });
            
        }   
        
        // Don't behave like a regular link
        // Stop propegation and bubbling
        return false;
    });

});