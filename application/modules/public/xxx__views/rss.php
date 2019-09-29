<?php echo '<?xml version="1.0" encoding="' . $encoding . '"?>' . "\n"; ?>
<rss version="2.0">
    <channel>
        <title><?php echo $feed_name; ?></title>
        <link><?php echo $feed_url; ?></link>
        <description><?php echo $page_description; ?></description>
        <language><?php echo $page_language; ?></language>
        <copyright>Copyright <?php echo gmdate("Y", time()); ?></copyright>
        <generator>FeedCreator 1.7.3</generator>
        <?php foreach ($posts as $post): ?>
            <item>
                <title><?php echo "Harmandir Sahib Hukumnama : " . date('D d F, Y', strtotime($post->date_hukam)); ?></title>
                <link><?php echo site_url('hukum/index/?dt=' . $post->date_hukam) ?></link>
                <guid><?php echo site_url('hukum/index/?dt=' . $post->date_hukam) ?></guid>
                <description><![CDATA[ <?php echo $post->contentEnglish; ?> ]]></description>
                <pubDate><?php echo $post->date_hukam; ?></pubDate>
            </item>
        <?php endforeach; ?>
    </channel>
</rss>