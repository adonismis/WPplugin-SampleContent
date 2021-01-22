<?php

class Content{

    public $menu;

    public function set_menu($menu){
        $this->menu = $menu;
    }

    public function add_menu(){
        add_action( 'admin_menu', array( $this, 'adminMenu' ) );
    }
    
    public function adminMenu()
    {
        $menu = $this->menu;
        $page_title = $menu["page_title"];
        $menu_title = $menu["menu_title"];

        add_menu_page(  $page_title, 
                        $menu_title, 
                        'manage_options', 
                        'theme-options', 
                        array($this ,'settingsPage')
                    );
    }

    public function settingsPage()
    {
        echo "
                <div>  
                    <h2>文章頁首文字</h2>  
                    <form method='post' action='options.php'>  
                    "
                    .wp_nonce_field('update-options').
                    "  
                        <p>  
                            <textarea  
                                name='display_text'
                                id='display_text'
                                cols='40' 
                                rows='6'>".get_option('display_text')."</textarea>  
                        </p>  
            
                        <p>  
                            <input type='hidden' name='action' value='update' />  
                            <input type='hidden' name='page_options' value='display_text' />  
                            <input type='submit' value='Save' class='button-primary' />  
                        </p>  
                    </form>  
                </div>  
            ";
    }

    public function add_ContentFilter(){
        add_filter('the_content', array( $this, 'content_addText' )); 
    }

    function content_addText($content)
    {
        $display_text = esc_html(get_option('display_text'));
        return "<p>
                    <font color='red'>{$display_text}</font>
                    <hr>
                </p>" . $content;
    }

}
?>