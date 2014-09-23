
/*-----------------------------------------------------------------------------------*/
/*	Add TinyMCE Alert
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.alert', {  
        init : function(ed, url) {  
            ed.addButton('alert', {  
                title : 'Add an Alert',  
                image : url + '/icons/alert.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_alert type="warning, error, success, info, notification"]Your Message[/ss_alert]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('alert', tinymce.plugins.alert);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add TinyMCE Button
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.button', {  
        init : function(ed, url) {  
            ed.addButton('button', {  
                title : 'Add a button',  
                image : url + '/icons/button.png',
                onclick : function() {  
                     ed.selection.setContent('[ss_button title="Your Title" link="#" size="small, medium, large" color="default, green, dark-green, light-green, gray, red" border="no" icon="" ]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('button', tinymce.plugins.button);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add TinyMCE Gap
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.gap', {  
        init : function(ed, url) {  
            ed.addButton('gap', {  
                title : 'Add a Gap',  
                image : url + '/icons/gap.png',
                onclick : function() {  
                     ed.selection.setContent('[ss_gap height="30"]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('gap', tinymce.plugins.gap);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add a Retina Icon
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.retina_icon', {  
        init : function(ed, url) {  
            ed.addButton('retina_icon', {
                title : 'Add a Retina Icon', 
                image : url + '/icons/retina_icon.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_retina_icon name="Icon Name" color="#00b688" size="small, medium, large"]<br/>Your Text<br/>[/ss_retina_icon]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('retina_icon', tinymce.plugins.retina_icon);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add a Icon Link
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_icon_link', {  
        init : function(ed, url) {  
            ed.addButton('ss_icon_link', {
                title : 'Add a Icon Link', 
                image : url + '/icons/icon_link.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_icon_link name="Icon Name" link="#" size="small, medium, large" type="1, 2, 3"]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_icon_link', tinymce.plugins.ss_icon_link);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add a Spnoy Exclusive Mosaic Gallery
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_mosaic_gallery', {  
        init : function(ed, url) {  
            ed.addButton('ss_mosaic_gallery', {
                title : 'Add Spnoy Exclusive Mosaic Gallery', 
                image : url + '/icons/spnoy_gallery.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_mosaic_gallery horizontal="no" horizontal_height="600" scrollbar_color="#00b688" ]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_mosaic_gallery', tinymce.plugins.ss_mosaic_gallery);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add a Icon Box Slider
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_icon_box_slider', {  
        init : function(ed, url) {  
            ed.addButton('ss_icon_box_slider', {
                title : 'Add a Icon Box Slider', 
                image : url + '/icons/icon_box_slider.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_icon_box_slider]<br>[ss_icon_box title="Your Title" link="#" icon="Icon Name" type="1, 2, 3"] Your Content [/ss_icon_box]<br>[ss_icon_box title="Your Title" link="#" icon="Icon Name" type="1, 2, 3"] Your Content [/ss_icon_box]<br>[ss_icon_box title="Your Title" link="#" icon="Icon Name" type="1, 2, 3"] Your Content [/ss_icon_box]<br>[/ss_icon_box_slider]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_icon_box_slider', tinymce.plugins.ss_icon_box_slider);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add a Icon Box Single
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_icon_box', {  
        init : function(ed, url) {  
            ed.addButton('ss_icon_box', {
                title : 'Add a Single Icon Box', 
                image : url + '/icons/icon_box.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_icon_box title="Your Title" link="#" icon="Icon Name" type="1, 2, 3"] Your Content [/ss_icon_box]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_icon_box', tinymce.plugins.ss_icon_box);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add a Pricing Table
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_pricing_table', {  
        init : function(ed, url) {  
            ed.addButton('ss_pricing_table', {
                title : 'Add a Pricing Table', 
                image : url + '/icons/pricing_tables.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_pricing_table name="Pricing Table Name" columns="2, 3, 4" ]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_pricing_table', tinymce.plugins.ss_pricing_table);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Charts
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_charts', {  
        init : function(ed, url) {  
            ed.addButton('ss_charts', {
                title : 'Add Pie Charts', 
                image : url + '/icons/pie_charts.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_charts]<br>[ss_chart percent="50" bar_color="#ffffff" track_color="#999999"] Your Content [/ss_chart]<br>[ss_chart percent="50" bar_color="#ffffff" track_color="#999999"] Your Content [/ss_chart]<br>[ss_chart percent="50" bar_color="#ffffff" track_color="#999999"] Your Content [/ss_chart]<br>[/ss_charts]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_charts', tinymce.plugins.ss_charts);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Team Members
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_team', {  
        init : function(ed, url) {  
            ed.addButton('ss_team', {
                title : 'Add Team Members', 
                image : url + '/icons/team_member.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_team]<br>[ss_team_member image="Image URL" name="Your Name" desc="Some Description" twitter="#" facebook="#" linkedin="#" google_plus="#" ]<br>[ss_team_member image="Image URL" name="Your Name" desc="Some Description" twitter="#" facebook="#" linkedin="#" google_plus="#" ]<br>[ss_team_member image="Image URL" name="Your Name" desc="Some Description" twitter="#" facebook="#" linkedin="#" google_plus="#" ]<br>[/ss_team]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_team', tinymce.plugins.ss_team);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Clients Slider
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_clients_slider', {  
        init : function(ed, url) {  
            ed.addButton('ss_clients_slider', {
                title : 'Add Clients Slider', 
                image : url + '/icons/clients_slider.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_clients_slider]<br>[ss_client name="Your Name" link="#" image="Image URL"]<br>[ss_client name="Your Name" link="#" image="Image URL"]<br>[ss_client name="Your Name" link="#" image="Image URL"]<br>[ss_client name="Your Name" link="#" image="Image URL"]<br>[/ss_clients_slider]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_clients_slider', tinymce.plugins.ss_clients_slider);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Testimonials Slider
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_testimonials_slider', {  
        init : function(ed, url) {  
            ed.addButton('ss_testimonials_slider', {
                title : 'Add Testimonials Slider', 
                image : url + '/icons/testimonial_slider.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_testimonials_slider]<br>[ss_testimonial name="Your Name" desc="Some Description"] Your Content [/ss_testimonial]<br>[ss_testimonial name="Your Name" desc="Some Description"] Your Content [/ss_testimonial]<br>[ss_testimonial name="Your Name" desc="Some Description"] Your Content [/ss_testimonial]<br>[/ss_testimonials_slider]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_testimonials_slider', tinymce.plugins.ss_testimonials_slider);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add a Light Box
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_lightbox', {  
        init : function(ed, url) {  
            ed.addButton('ss_lightbox', {
                title : 'Add a Lightbox', 
                image : url + '/icons/lightbox.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_lightbox cover="Cover Image URL" image="Fullsize Image URL" video="Video URL"]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_lightbox', tinymce.plugins.ss_lightbox);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Timeline Blog
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_timeline_blog', {  
        init : function(ed, url) {  
            ed.addButton('ss_timeline_blog', {
                title : 'Add Timeline Blog', 
                image : url + '/icons/timlelined_post.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_timeline_blog number="5" start_title="START" start_time="May 2014"]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_timeline_blog', tinymce.plugins.ss_timeline_blog);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Featured Portfolio
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_featured_portfolio', {  
        init : function(ed, url) {  
            ed.addButton('ss_featured_portfolio', {
                title : 'Add Featured Portfolio', 
                image : url + '/icons/featured_portfolio.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_featured_portfolio number="5" columns="3" gutter="yes" fullscreen="no" filter_bar="yes" ]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_featured_portfolio', tinymce.plugins.ss_featured_portfolio);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Accordions
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_accordions', {  
        init : function(ed, url) {  
            ed.addButton('ss_accordions', {
                title : 'Add Accordions', 
                image : url + '/icons/accordion.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_accordions]<br>[ss_accordion title="Your Title" ] Your Content [ss_accordion]<br>[ss_accordion title="Your Title" ] Your Content [ss_accordion]<br>[ss_accordion title="Your Title" ] Your Content [ss_accordion]<br>[/ss_accordions]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_accordions', tinymce.plugins.ss_accordions);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Toggle
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_toggle', {  
        init : function(ed, url) {  
            ed.addButton('ss_toggle', {
                title : 'Add Toggle', 
                image : url + '/icons/toggle.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_toggle title="Your Title" ] Your Content [/ss_toggle]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_toggle', tinymce.plugins.ss_toggle);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Separator
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_separator', {  
        init : function(ed, url) {  
            ed.addButton('ss_separator', {
                title : 'Add Separator', 
                image : url + '/icons/seprator.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_separator size="full" icon="icon-heart3" ]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_separator', tinymce.plugins.ss_separator);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Tabs
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_tabs', {  
        init : function(ed, url) {  
            ed.addButton('ss_tabs', {
                title : 'Add Tabs', 
                image : url + '/icons/tabs.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_tabs type="1, 2" ]<br>[ss_tab title="Your Title"] Your Content [/ss_tab]<br>[ss_tab title="Your Title"] Your Content [/ss_tab]<br>[ss_tab title="Your Title"] Your Content [/ss_tab]<br>[/ss_tabs]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_tabs', tinymce.plugins.ss_tabs);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Testimonial Single
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_testimonial_single', {  
        init : function(ed, url) {  
            ed.addButton('ss_testimonial_single', {
                title : 'Add Single Testimonial', 
                image : url + '/icons/single_testimonial.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_testimonial_single name="Your Name" desc="Some Description" type="1, 2, 3" ] Your Content [/ss_testimonial_single]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_testimonial_single', tinymce.plugins.ss_testimonial_single);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Fullscreen Video
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_fullscreen_video', {  
        init : function(ed, url) {  
            ed.addButton('ss_fullscreen_video', {
                title : 'Add Fullscreen Video', 
                image : url + '/icons/fullscreen_video.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_fullscreen_video poster="Image URL" mp4="Your MP4 Video URL" ogv="Your OGV Video URL" webm="Your webM Video URL" ]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_fullscreen_video', tinymce.plugins.ss_fullscreen_video);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add Blog Teaser
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_blog_teaser', {  
        init : function(ed, url) {  
            ed.addButton('ss_blog_teaser', {
                title : 'Add Blog Teaser', 
                image : url + '/icons/blog_teaser.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_blog_teaser number="4" ]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_blog_teaser', tinymce.plugins.ss_blog_teaser);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add TinyMCE 1/1
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.ss_highlight', {  
        init : function(ed, url) {  
            ed.addButton('ss_highlight', {
                title : 'Add Highlight', 
                image : url + '/icons/highlight.png',  
                onclick : function() {  
                     ed.selection.setContent('[ss_highlight link="#"] Your Content [/ss_highlight]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('ss_highlight', tinymce.plugins.ss_highlight);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add TinyMCE 1/1
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.one_one', {  
        init : function(ed, url) {  
            ed.addButton('one_one', {
                title : 'Add a Full Column', 
                image : url + '/icons/one_one.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_one]<br/>Your Content<br/>[/one_one]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_one', tinymce.plugins.one_one);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add TinyMCE 1/2
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.one_half', {  
        init : function(ed, url) {  
            ed.addButton('one_half', {
                title : 'Add 1/2 Columns', 
                image : url + '/icons/one_half.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_half]<br/>Your Content<br/>[/one_half]<br/>[one_half last="yes"]<br/>Your Content<br/>[/one_half]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_half', tinymce.plugins.one_half);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add TinyMCE 1/3
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.one_third', {  
        init : function(ed, url) {  
            ed.addButton('one_third', {
                title : 'Add 1/3 Columns', 
                image : url + '/icons/one_third.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_third]<br/>Your Content<br/>[/one_third]<br/>[one_third]<br/>Your Content<br/>[/one_third]<br/>[one_third last="yes"]<br/>Your Content<br/>[/one_third]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_third', tinymce.plugins.one_third);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add TinyMCE 1/4
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.one_fourth', {  
        init : function(ed, url) {  
            ed.addButton('one_fourth', {
                title : 'Add 1/4 Columns', 
                image : url + '/icons/one_fourth.png',  
                onclick : function() {  
                     ed.selection.setContent('[one_fourth]<br/>Your Content<br/>[/one_fourth]<br/>[one_fourth]<br/>Your Content<br/>[/one_fourth]<br/>[one_fourth]<br/>Your Content<br/>[/one_fourth]<br/>[one_fourth last="yes"]<br/>Your Content<br/>[/one_fourth]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('one_fourth', tinymce.plugins.one_fourth);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add TinyMCE 2/3
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.two_third', {  
        init : function(ed, url) {  
            ed.addButton('two_third', {
                title : 'Add 2/3 Columns', 
                image : url + '/icons/two_third.png',  
                onclick : function() {  
                     ed.selection.setContent('[two_third]<br/>Your Content<br/>[/two_third]<br/>[one_third last="yes"]<br/>Your Content<br/>[/one_third]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('two_third', tinymce.plugins.two_third);  
})();


/*-----------------------------------------------------------------------------------*/
/*  Add TinyMCE 3/4
/*-----------------------------------------------------------------------------------*/

(function() {  
    tinymce.create('tinymce.plugins.three_fourth', {  
        init : function(ed, url) {  
            ed.addButton('three_fourth', {
                title : 'Add 3/4 Columns', 
                image : url + '/icons/three_fourth.png',  
                onclick : function() {  
                     ed.selection.setContent('[three_fourth]<br/>Your Content<br/>[/three_fourth]<br/>[one_fourth last="yes"]<br/>Your Content<br/>[/one_fourth]');
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('three_fourth', tinymce.plugins.three_fourth);  
})();

