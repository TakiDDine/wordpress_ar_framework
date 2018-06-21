<?php 

add_shortcode( 'download_table', 'download_table_func' );
function download_table_func( $atts ) {
    $atts = shortcode_atts( array(
        'title' => ''
    ), $atts, 'download_table' );
    global $post;
    $downloads = get_post_meta($post->ID,'downloads',true);
    if( !empty($downloads) ) {
        if( $atts['title'] != '' ) {
            echo '<h3>'. $atts['title'] .'</h3>';
        }
        ?>
        <div class="table-responsive">
            <table class="table table-striped download-links">
                <thead>
                    <tr>
                        <th>Server</th>
                        <th>Link</th>
                        <th>Date</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach( $downloads as $download ) {
                        ?>
                        <tr>
                            <td><i class="fas fa-server"></i> <?php echo $download['server_name']; ?></td>
                            <td><i class="fas fa-download"></i> <a target="_blank" href="<?php echo $download['download_link']; ?>">Download</a></td>
                            <td><i class="fas fa-calendar-alt"></i> <?php echo $download['date']; ?></td>
                            <td><i class="fas fa-calendar-alt"></i> <?php echo $download['update']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}