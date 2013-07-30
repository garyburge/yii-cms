<?php

class m130719_101014_create_content_tables extends CDbMigration
{
    protected $sqlOptions = 'ENGINE=InnoDB CHARSET=utf8';

	public function up()
	{
        // create content table
        $this->createTable('content', array(
            'id'=>'pk',
            'title'=>'VARCHAR(255) NOT NULL',
            'subtitle'=>'VARCHAR(255) NULL DEFAULT NULL',
            'abstract'=>'text NULL DEFAULT NULL',
            'body'=>'text NOT NULL',
            'created'=>'INTEGER NULL DEFAULT NULL',
            'updated'=>'INTEGER NULL DEFAULT NULL',
            'published'=>'INTEGER NULL DEFAULT NULL',
            'history'=>'text NOT NULL',
        ), $this->sqlOptions);
        $this->createIndex('content_title', 'content', 'title', false);
        $this->createIndex('content_date', 'content', 'created, updated, published', false);

        // create author table
        $this->createTable('author', array(
            'id'=>'pk',
            'first_name'=>'VARCHAR(64) NULL DEFAULT NULL',
            'middle_name'=>'VARCHAR(64) NULL DEFAULT NULL',
            'last_name'=>'VARCHAR(64) NOT NULL',
            'phone'=>'VARCHAR(24) NULL DEFAULT NULL',
            'email'=>'VARCHAR(128) NULL DEFAULT NULL',
            'website'=>'VARCHAR(255) NULL DEFAULT NULL',
            'short_bio'=>'TEXT NULL DEFAULT NULL',
            'bio'=>'TEXT NULL DEFAULT NULL',
            'media_id'=>'INTEGER NULL DEFAULT NULL',
            'created'=>'INTEGER NULL DEFAULT NULL',
            'updated'=>'INTEGER NULL DEFAULT NULL',
        ), $this->sqlOptions);
        $this->createIndex('author_name', 'author', 'last_name, first_name', false);
        $this->createIndex('author_media_id', 'author', 'media_id', false);
        $this->createIndex('author_date', 'author', 'created, updated', false);

        // create byline table
        $this->createTable('byline', array(
            'id'=>'pk',
            'author_id'=>'INTEGER NOT NULL',
            'byline'=>'VARCHAR(255) NOT NULL',
            'title'=>'VARCHAR(255) NULL DEFAULT NULL',
            'created'=>'INTEGER NULL DEFAULT NULL',
            'updated'=>'INTEGER NULL DEFAULT NULL',
        ), $this->sqlOptions);
        $this->createIndex('byline_author_id', 'byline', 'author_id', false);
        $this->createIndex('byline_date', 'byline', 'created, updated', false);

        // create tag table
        $this->createTable('tag', array(
            'id'=>'pk',
            'name'=>'VARCHAR(64) NOT NULL',
            'created'=>'INTEGER NULL DEFAULT NULL',
            'updated'=>'INTEGER NULL DEFAULT NULL',
        ), $this->sqlOptions);
        $this->createIndex('tag_name', 'tag', 'name', false);
        $this->createIndex('tag_date', 'tag', 'created, updated', false);

        // create media table
        $this->createTable('media', array(
            'id'=>'pk',
            'media_type_id'=>'INTEGER NOT NULL',
            'file'=>'VARCHAR(255) NOT NULL',
            'title'=>'VARCHAR(255) NOT NULL',
            'caption'=>'TEXT NULL DEFAULT NULL',
            'attribution'=>'VARCHAR(255) NULL DEFAULT NULL',
            'copyright'=>'VARCHAR(255) NULL DEFAULT NULL',
            'height'=>'INTEGER NULL DEFAULT NULL',
            'width'=>'INTEGER NULL DEFAULT NULL',
            'created'=>'INTEGER NULL DEFAULT NULL',
            'updated'=>'INTEGER NULL DEFAULT NULL',
        ), $this->sqlOptions);
        $this->createIndex('media_media_type_id', 'media', 'media_type_id', false);
        $this->createIndex('media_file', 'media', 'file', false);
        $this->createIndex('media_title', 'media', 'title', false);
        $this->createIndex('media_attribution', 'media', 'attribution', false);
        $this->createIndex('media_date', 'media', 'created, updated', false);

        // create media type table
        $this->createTable('media_type', array(
            'id'=>'pk',
            'extension'=>'VARCHAR(12) NOT NULL',
            'name'=>'VARCHAR(64) NOT NULL',
            'type'=>'VARCHAR(128) NOT NULL',
            'description'=>'VARCHAR(255) NULL DEFAULT NULL',
        ), $this->sqlOptions);
        $this->createIndex('media_type_extension', 'media_type', 'extension', false);
        $this->createIndex('media_type_name', 'media_type', 'name', false);
        $this->createIndex('media_type_type', 'media_type', 'type', false);

        // insert media type data
        $this->insert('media_type', array(
            'extension'=>'gif',
            'name'=>'image',
            'type'=>'image/gif',
            'description'=>'gif image file',
        ));
        $this->insert('media_type', array(
            'extension'=>'jpg',
            'name'=>'image',
            'type'=>'image/jpeg',
            'description'=>'jpg image file',
        ));
        $this->insert('media_type', array(
            'extension'=>'png',
            'name'=>'image',
            'type'=>'image/[mg',
            'description'=>'[mg image file',
        ));
        $this->insert('media_type', array(
            'extension'=>'mp4',
            'name'=>'audio',
            'type'=>'audio/mp4',
            'description'=>'mp4 audio file',
        ));
        $this->insert('media_type', array(
            'extension'=>'mpeg',
            'name'=>'audio',
            'type'=>'audio/mpeg',
            'description'=>'mpeg audio file',
        ));
        $this->insert('media_type', array(
            'extension'=>'webm',
            'name'=>'audio',
            'type'=>'audio/webm',
            'description'=>'webm audio file',
        ));
        $this->insert('media_type', array(
            'extension'=>'mpeg',
            'name'=>'video',
            'type'=>'view/mpeg',
            'description'=>'mpeg video file',
        ));
        $this->insert('media_type', array(
            'extension'=>'mp4',
            'name'=>'video',
            'type'=>'video/mp4',
            'description'=>'mp4 video file',
        ));
        $this->insert('media_type', array(
            'extension'=>'qt',
            'name'=>'video',
            'type'=>'video/quicktime',
            'description'=>'quicktime video file',
        ));
        $this->insert('media_type', array(
            'extension'=>'webm',
            'name'=>'video',
            'type'=>'video/webm',
            'description'=>'webm video file',
        ));
        $this->insert('media_type', array(
            'extension'=>'wmv',
            'name'=>'video',
            'type'=>'video/x-ms-wmv',
            'description'=>'microsoft wmv video file',
        ));
        $this->insert('media_type', array(
            'extension'=>'flv',
            'name'=>'video',
            'type'=>'video/x-flv',
            'description'=>'adobe flash video file',
        ));

        // create author content table
        $this->createTable('author_content', array(
            'id'=>'pk',
            'author_id'=>'INTEGER NOT NULL',
            'content_id'=>'INTEGER NOT NULL',
            'byline_id'=>'INTEGER NOT NULL',
        ), $this->sqlOptions);
        $this->createIndex('author_content_author_id', 'author_content', 'author_id', false);
        $this->createIndex('author_content_content_id', 'author_content', 'content_id', false);
        $this->createIndex('author_content_byline_id', 'author_content', 'byline_id', false);

        // create content media table
        $this->createTable('content_media', array(
            'id'=>'pk',
            'content_id'=>'INTEGER NOT NULL',
            'media_id'=>'INTEGER NOT NULL',
        ), $this->sqlOptions);
        $this->createIndex('content_media_content_id', 'content_media', 'content_id', false);
        $this->createIndex('content_media_media_id', 'content_media', 'media_id', false);

        // create content tag table
        $this->createTable('content_tag', array(
            'id'=>'pk',
            'content_id'=>'INTEGER NOT NULL',
            'tag_id'=>'INTEGER NOT NULL',
        ), $this->sqlOptions);
        $this->createIndex('content_tag_content_id', 'content_tag', 'content_id', false);
        $this->createIndex('content_tag_tag_id', 'content_tag', 'tag_id', false);
    }

	public function down()
	{
        // drop tables
        $this->dropTable('content');
        $this->dropTable('author');
        $this->dropTable('byline');
        $this->dropTable('tag');
        $this->dropTable('media');
        $this->dropTable('author_content');
        $this->dropTable('content_media');
        $this->dropTable('content_tag');

	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}