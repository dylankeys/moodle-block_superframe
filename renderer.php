<?php

class block_superframe_renderer extends plugin_renderer_base {

    function display_view_page($url, $width, $height, $courseid) {

        global $USER;

        $data = new stdClass();

        // Page heading and iframe data.
        $data->heading = get_string('pluginname', 'block_superframe');
        $data->url = $url;
        $data->height = $height;
        $data->width = $width;
        $data->user = fullname($USER);
        $data->returnlink = new moodle_url('/course/view.php', ['id' => $courseid]);
        $data->returntext = get_string('returncourse', 'block_superframe');

        // Start output to browser.
        echo $this->output->header();

        // Render the data in a Mustache template.
        echo $this->render_from_template('block_superframe/frame', $data);

        // Finish the page.
        echo $this->output->footer();
    }

    function fetch_block_content($blockid, $courseid) {

        global $USER;

        $data = new stdClass();

        $data->user = fullname($USER);
        $data->url = new moodle_url('/blocks/superframe/view.php', ['blockid' => $blockid, 'courseid' => $courseid]);

        // Add a link to the popup page:
        $data->popurl = new moodle_url('/blocks/superframe/block_data.php');
        $data->poptext = get_string('poplink', 'block_superframe');

        // Render the data in a Mustache template and return to the block
        return $this->render_from_template('block_superframe/block_content', $data);
    }

    /**
     * Function to display a table of records
     * @param array the records to display.
     * @return none.
     */
    public function display_block_table($records) {
        // Prepare the data for the template.
        $table = new stdClass();
        // Table headers.
        $table->tableheaders = [
            get_string('blockid', 'block_superframe'),
            get_string('blockname', 'block_superframe'),
            get_string('course', 'block_superframe'),
            get_string('catname', 'block_superframe'),
        ];
        // Build the data rows.
        foreach ($records as $record) {
            $data = array();
            $data[] = $record->id;
            $data[] = $record->blockname;
            $data[] = $record->shortname;
            $data[] = $record->catname;
            $table->tabledata[] = $data;
        }
        // Start output to browser.
        echo $this->output->header();
        // Call our template to render the data.
        echo $this->render_from_template(
            'block_superframe/block_table', $table);
        // Finish the page.
        echo $this->output->footer();
    }
}