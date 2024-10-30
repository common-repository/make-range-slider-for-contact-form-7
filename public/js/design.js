jQuery( document ).ready(function() {
    // console.log( "slider ready!" );

    jQuery('.range_slider_class').each( function(){
        // console.log( "each ready" );
        var rsfcf7_current_value = jQuery(this);
        var rsfcf7_id = rsfcf7_current_value.attr("id");
        var rsfcf7_min_range = rsfcf7_current_value.attr("rsfcf7_min_range");
        var rsfcf7_max_range = rsfcf7_current_value.attr("rsfcf7_max_range");
        var rsfcf7_set_default = rsfcf7_current_value.attr("rsfcf7_set_default");
        var rsfcf7_tooltip_label = rsfcf7_current_value.attr("rsfcf7_tooltip_label");
        var rsfcf7_slider_label = rsfcf7_current_value.attr("rsfcf7_slider_label");
        var rsfcf7_min = parseInt(rsfcf7_min_range);
        var rsfcf7_max = parseInt(rsfcf7_max_range);

        var rsfcf7_set_default = jQuery(this).attr("rsfcf7_set_default").trim();
        if(rsfcf7_set_default != ''){
            var rsfcf7_set_arra = rsfcf7_set_default.trim().split("-");
        }
        var rsfcf7_arr = rsfcf7_set_arra.map(Number);

        if(rsfcf7_tooltip_label == 'true'){
            rsfcf7_tooltip_labels = true;
        }
        if(rsfcf7_tooltip_label == 'false'){
            rsfcf7_tooltip_labels = false;
        }

        if(rsfcf7_slider_label == 'true'){
            rsfcf7_slider_labels = true;
        }
        if(rsfcf7_slider_label == 'false'){
            rsfcf7_slider_labels = false;
        }
        
        var range_slider = new rSlider({
            target: rsfcf7_id,
            values: {min: rsfcf7_min, max: rsfcf7_max},
            range: false,
            step: 5,
            tooltip: rsfcf7_tooltip_labels,
            set: rsfcf7_arr,
            labels: rsfcf7_slider_labels,
            onChange: function (vals) {
                // console.log(vals);
                rsfcf7_current_value.find("input").val(vals);
            }
        });
    });
});