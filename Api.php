<?php
/** @noinspection PhpUnused */

//functions automatically generated from https://core.telegram.org/bots/api
//generator source code https://github.com/davtur19/TuriBotGen

namespace TuriBot;

abstract class Api implements ApiInterface {

    public function getUpdates(
        ?int $offset, 
        ?int $limit, 
        ?int $timeout, 
        ?array $allowed_updates
    ): \stdClass {
        $args = [];

        if (null !== $offset) $args['offset'] = $offset;
        if (null !== $limit) $args['limit'] = $limit;
        if (null !== $timeout) $args['timeout'] = $timeout;
        if (null !== $allowed_updates) $args['allowed_updates'] = json_encode($allowed_updates);

        return $this->Request('getUpdates', $args);
    }

    public function setWebhook(
        string $url, 
        ?\CURLFile $certificate, 
        ?string $ip_address, 
        ?int $max_connections, 
        ?array $allowed_updates, 
        ?bool $drop_pending_updates, 
        ?string $secret_token
    ): \stdClass {
        $args = [
            'url' => $url
        ];

        if (null !== $certificate) $args['certificate'] = $certificate;
        if (null !== $ip_address) $args['ip_address'] = $ip_address;
        if (null !== $max_connections) $args['max_connections'] = $max_connections;
        if (null !== $allowed_updates) $args['allowed_updates'] = json_encode($allowed_updates);
        if (null !== $drop_pending_updates) $args['drop_pending_updates'] = $drop_pending_updates;
        if (null !== $secret_token) $args['secret_token'] = $secret_token;

        return $this->Request('setWebhook', $args);
    }

    public function deleteWebhook(
        ?bool $drop_pending_updates
    ): \stdClass {
        $args = [];

        if (null !== $drop_pending_updates) $args['drop_pending_updates'] = $drop_pending_updates;

        return $this->Request('deleteWebhook', $args);
    }

    public function getWebhookInfo()
    {
        return $this->Request('getWebhookInfo', []);
    }

    public function getMe()
    {
        return $this->Request('getMe', []);
    }

    public function logOut()
    {
        return $this->Request('logOut', []);
    }

    public function close()
    {
        return $this->Request('close', []);
    }

    public function sendMessage(
        int|string $chat_id, 
        string $text, 
        ?int $message_thread_id, 
        ?string $parse_mode, 
        ?array $entities, 
        ?array $link_preview_options, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'text' => $text
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $parse_mode) $args['parse_mode'] = $parse_mode;
        if (null !== $entities) $args['entities'] = json_encode($entities);
        if (null !== $link_preview_options) $args['link_preview_options'] = json_encode($link_preview_options);
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendMessage', $args);
    }

    public function forwardMessage(
        int|string $chat_id, 
        int|string $from_chat_id, 
        int $message_id, 
        ?int $message_thread_id, 
        ?bool $disable_notification, 
        ?bool $protect_content
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_id' => $message_id
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;

        return $this->Request('forwardMessage', $args);
    }

    public function forwardMessages(
        int|string $chat_id, 
        int|string $from_chat_id, 
        array $message_ids, 
        ?int $message_thread_id, 
        ?bool $disable_notification, 
        ?bool $protect_content
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_ids' => json_encode($message_ids)
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;

        return $this->Request('forwardMessages', $args);
    }

    public function copyMessage(
        int|string $chat_id, 
        int|string $from_chat_id, 
        int $message_id, 
        ?int $message_thread_id, 
        ?string $caption, 
        ?string $parse_mode, 
        ?array $caption_entities, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_id' => $message_id
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $caption) $args['caption'] = $caption;
        if (null !== $parse_mode) $args['parse_mode'] = $parse_mode;
        if (null !== $caption_entities) $args['caption_entities'] = json_encode($caption_entities);
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('copyMessage', $args);
    }

    public function copyMessages(
        int|string $chat_id, 
        int|string $from_chat_id, 
        array $message_ids, 
        ?int $message_thread_id, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?bool $remove_caption
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_ids' => json_encode($message_ids)
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $remove_caption) $args['remove_caption'] = $remove_caption;

        return $this->Request('copyMessages', $args);
    }

    public function sendPhoto(
        int|string $chat_id, 
        \CURLFile|string $photo, 
        ?int $message_thread_id, 
        ?string $caption, 
        ?string $parse_mode, 
        ?array $caption_entities, 
        ?bool $has_spoiler, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'photo' => $photo
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $caption) $args['caption'] = $caption;
        if (null !== $parse_mode) $args['parse_mode'] = $parse_mode;
        if (null !== $caption_entities) $args['caption_entities'] = json_encode($caption_entities);
        if (null !== $has_spoiler) $args['has_spoiler'] = $has_spoiler;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendPhoto', $args);
    }

    public function sendAudio(
        int|string $chat_id, 
        \CURLFile|string $audio, 
        ?int $message_thread_id, 
        ?string $caption, 
        ?string $parse_mode, 
        ?array $caption_entities, 
        ?int $duration, 
        ?string $performer, 
        ?string $title, 
        \CURLFile|string|null $thumbnail, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'audio' => $audio
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $caption) $args['caption'] = $caption;
        if (null !== $parse_mode) $args['parse_mode'] = $parse_mode;
        if (null !== $caption_entities) $args['caption_entities'] = json_encode($caption_entities);
        if (null !== $duration) $args['duration'] = $duration;
        if (null !== $performer) $args['performer'] = $performer;
        if (null !== $title) $args['title'] = $title;
        if (null !== $thumbnail) $args['thumbnail'] = $thumbnail;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendAudio', $args);
    }

    public function sendDocument(
        int|string $chat_id, 
        \CURLFile|string $document, 
        ?int $message_thread_id, 
        \CURLFile|string|null $thumbnail, 
        ?string $caption, 
        ?string $parse_mode, 
        ?array $caption_entities, 
        ?bool $disable_content_type_detection, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'document' => $document
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $thumbnail) $args['thumbnail'] = $thumbnail;
        if (null !== $caption) $args['caption'] = $caption;
        if (null !== $parse_mode) $args['parse_mode'] = $parse_mode;
        if (null !== $caption_entities) $args['caption_entities'] = json_encode($caption_entities);
        if (null !== $disable_content_type_detection) $args['disable_content_type_detection'] = $disable_content_type_detection;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendDocument', $args);
    }

    public function sendVideo(
        int|string $chat_id, 
        \CURLFile|string $video, 
        ?int $message_thread_id, 
        ?int $duration, 
        ?int $width, 
        ?int $height, 
        \CURLFile|string|null $thumbnail, 
        ?string $caption, 
        ?string $parse_mode, 
        ?array $caption_entities, 
        ?bool $has_spoiler, 
        ?bool $supports_streaming, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'video' => $video
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $duration) $args['duration'] = $duration;
        if (null !== $width) $args['width'] = $width;
        if (null !== $height) $args['height'] = $height;
        if (null !== $thumbnail) $args['thumbnail'] = $thumbnail;
        if (null !== $caption) $args['caption'] = $caption;
        if (null !== $parse_mode) $args['parse_mode'] = $parse_mode;
        if (null !== $caption_entities) $args['caption_entities'] = json_encode($caption_entities);
        if (null !== $has_spoiler) $args['has_spoiler'] = $has_spoiler;
        if (null !== $supports_streaming) $args['supports_streaming'] = $supports_streaming;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendVideo', $args);
    }

    public function sendAnimation(
        int|string $chat_id, 
        \CURLFile|string $animation, 
        ?int $message_thread_id, 
        ?int $duration, 
        ?int $width, 
        ?int $height, 
        \CURLFile|string|null $thumbnail, 
        ?string $caption, 
        ?string $parse_mode, 
        ?array $caption_entities, 
        ?bool $has_spoiler, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'animation' => $animation
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $duration) $args['duration'] = $duration;
        if (null !== $width) $args['width'] = $width;
        if (null !== $height) $args['height'] = $height;
        if (null !== $thumbnail) $args['thumbnail'] = $thumbnail;
        if (null !== $caption) $args['caption'] = $caption;
        if (null !== $parse_mode) $args['parse_mode'] = $parse_mode;
        if (null !== $caption_entities) $args['caption_entities'] = json_encode($caption_entities);
        if (null !== $has_spoiler) $args['has_spoiler'] = $has_spoiler;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendAnimation', $args);
    }

    public function sendVoice(
        int|string $chat_id, 
        \CURLFile|string $voice, 
        ?int $message_thread_id, 
        ?string $caption, 
        ?string $parse_mode, 
        ?array $caption_entities, 
        ?int $duration, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'voice' => $voice
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $caption) $args['caption'] = $caption;
        if (null !== $parse_mode) $args['parse_mode'] = $parse_mode;
        if (null !== $caption_entities) $args['caption_entities'] = json_encode($caption_entities);
        if (null !== $duration) $args['duration'] = $duration;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendVoice', $args);
    }

    public function sendVideoNote(
        int|string $chat_id, 
        \CURLFile|string $video_note, 
        ?int $message_thread_id, 
        ?int $duration, 
        ?int $length, 
        \CURLFile|string|null $thumbnail, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'video_note' => $video_note
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $duration) $args['duration'] = $duration;
        if (null !== $length) $args['length'] = $length;
        if (null !== $thumbnail) $args['thumbnail'] = $thumbnail;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendVideoNote', $args);
    }

    public function sendMediaGroup(
        int|string $chat_id, 
        array $media, 
        ?int $message_thread_id, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
        ];

    foreach ($media as $key => $value) {
            if (is_object($value['media'])) {
                $args['upload' . $key] = $value['media'];
                $media[$key]['media'] = 'attach://upload' . $key;
            }
        }
        $args['media'] = json_encode($media);

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);

        return $this->Request('sendMediaGroup', $args);
    }

    public function sendLocation(
        int|string $chat_id, 
        float $latitude, 
        float $longitude, 
        ?int $message_thread_id, 
        ?float $horizontal_accuracy, 
        ?int $live_period, 
        ?int $heading, 
        ?int $proximity_alert_radius, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'latitude' => $latitude,
            'longitude' => $longitude
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $horizontal_accuracy) $args['horizontal_accuracy'] = $horizontal_accuracy;
        if (null !== $live_period) $args['live_period'] = $live_period;
        if (null !== $heading) $args['heading'] = $heading;
        if (null !== $proximity_alert_radius) $args['proximity_alert_radius'] = $proximity_alert_radius;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendLocation', $args);
    }

    public function sendVenue(
        int|string $chat_id, 
        float $latitude, 
        float $longitude, 
        string $title, 
        string $address, 
        ?int $message_thread_id, 
        ?string $foursquare_id, 
        ?string $foursquare_type, 
        ?string $google_place_id, 
        ?string $google_place_type, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $foursquare_id) $args['foursquare_id'] = $foursquare_id;
        if (null !== $foursquare_type) $args['foursquare_type'] = $foursquare_type;
        if (null !== $google_place_id) $args['google_place_id'] = $google_place_id;
        if (null !== $google_place_type) $args['google_place_type'] = $google_place_type;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendVenue', $args);
    }

    public function sendContact(
        int|string $chat_id, 
        string $phone_number, 
        string $first_name, 
        ?int $message_thread_id, 
        ?string $last_name, 
        ?string $vcard, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'phone_number' => $phone_number,
            'first_name' => $first_name
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $last_name) $args['last_name'] = $last_name;
        if (null !== $vcard) $args['vcard'] = $vcard;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendContact', $args);
    }

    public function sendPoll(
        int|string $chat_id, 
        string $question, 
        array $options, 
        ?int $message_thread_id, 
        ?bool $is_anonymous, 
        ?string $type, 
        ?bool $allows_multiple_answers, 
        ?int $correct_option_id, 
        ?string $explanation, 
        ?string $explanation_parse_mode, 
        ?array $explanation_entities, 
        ?int $open_period, 
        ?int $close_date, 
        ?bool $is_closed, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'question' => $question,
            'options' => json_encode($options)
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $is_anonymous) $args['is_anonymous'] = $is_anonymous;
        if (null !== $type) $args['type'] = $type;
        if (null !== $allows_multiple_answers) $args['allows_multiple_answers'] = $allows_multiple_answers;
        if (null !== $correct_option_id) $args['correct_option_id'] = $correct_option_id;
        if (null !== $explanation) $args['explanation'] = $explanation;
        if (null !== $explanation_parse_mode) $args['explanation_parse_mode'] = $explanation_parse_mode;
        if (null !== $explanation_entities) $args['explanation_entities'] = json_encode($explanation_entities);
        if (null !== $open_period) $args['open_period'] = $open_period;
        if (null !== $close_date) $args['close_date'] = $close_date;
        if (null !== $is_closed) $args['is_closed'] = $is_closed;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendPoll', $args);
    }

    public function sendDice(
        int|string $chat_id, 
        ?int $message_thread_id, 
        ?string $emoji, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $emoji) $args['emoji'] = $emoji;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendDice', $args);
    }

    public function sendChatAction(
        int|string $chat_id, 
        string $action, 
        ?int $message_thread_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'action' => $action
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;

        return $this->Request('sendChatAction', $args);
    }

    public function setMessageReaction(
        int|string $chat_id, 
        int $message_id, 
        ?array $reaction, 
        ?bool $is_big
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'message_id' => $message_id
        ];

        if (null !== $reaction) $args['reaction'] = json_encode($reaction);
        if (null !== $is_big) $args['is_big'] = $is_big;

        return $this->Request('setMessageReaction', $args);
    }

    public function getUserProfilePhotos(
        int $user_id, 
        ?int $offset, 
        ?int $limit
    ): \stdClass {
        $args = [
            'user_id' => $user_id
        ];

        if (null !== $offset) $args['offset'] = $offset;
        if (null !== $limit) $args['limit'] = $limit;

        return $this->Request('getUserProfilePhotos', $args);
    }

    public function getFile(
        string $file_id
    ): \stdClass {
        $args = [
            'file_id' => $file_id
        ];


        return $this->Request('getFile', $args);
    }

    public function banChatMember(
        int|string $chat_id, 
        int $user_id, 
        ?int $until_date, 
        ?bool $revoke_messages
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'user_id' => $user_id
        ];

        if (null !== $until_date) $args['until_date'] = $until_date;
        if (null !== $revoke_messages) $args['revoke_messages'] = $revoke_messages;

        return $this->Request('banChatMember', $args);
    }

    public function unbanChatMember(
        int|string $chat_id, 
        int $user_id, 
        ?bool $only_if_banned
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'user_id' => $user_id
        ];

        if (null !== $only_if_banned) $args['only_if_banned'] = $only_if_banned;

        return $this->Request('unbanChatMember', $args);
    }

    public function restrictChatMember(
        int|string $chat_id, 
        int $user_id, 
        array $permissions, 
        ?bool $use_independent_chat_permissions, 
        ?int $until_date
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'user_id' => $user_id,
            'permissions' => json_encode($permissions)
        ];

        if (null !== $use_independent_chat_permissions) $args['use_independent_chat_permissions'] = $use_independent_chat_permissions;
        if (null !== $until_date) $args['until_date'] = $until_date;

        return $this->Request('restrictChatMember', $args);
    }

    public function promoteChatMember(
        int|string $chat_id, 
        int $user_id, 
        ?bool $is_anonymous, 
        ?bool $can_manage_chat, 
        ?bool $can_delete_messages, 
        ?bool $can_manage_video_chats, 
        ?bool $can_restrict_members, 
        ?bool $can_promote_members, 
        ?bool $can_change_info, 
        ?bool $can_invite_users, 
        ?bool $can_post_messages, 
        ?bool $can_edit_messages, 
        ?bool $can_pin_messages, 
        ?bool $can_post_stories, 
        ?bool $can_edit_stories, 
        ?bool $can_delete_stories, 
        ?bool $can_manage_topics
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'user_id' => $user_id
        ];

        if (null !== $is_anonymous) $args['is_anonymous'] = $is_anonymous;
        if (null !== $can_manage_chat) $args['can_manage_chat'] = $can_manage_chat;
        if (null !== $can_delete_messages) $args['can_delete_messages'] = $can_delete_messages;
        if (null !== $can_manage_video_chats) $args['can_manage_video_chats'] = $can_manage_video_chats;
        if (null !== $can_restrict_members) $args['can_restrict_members'] = $can_restrict_members;
        if (null !== $can_promote_members) $args['can_promote_members'] = $can_promote_members;
        if (null !== $can_change_info) $args['can_change_info'] = $can_change_info;
        if (null !== $can_invite_users) $args['can_invite_users'] = $can_invite_users;
        if (null !== $can_post_messages) $args['can_post_messages'] = $can_post_messages;
        if (null !== $can_edit_messages) $args['can_edit_messages'] = $can_edit_messages;
        if (null !== $can_pin_messages) $args['can_pin_messages'] = $can_pin_messages;
        if (null !== $can_post_stories) $args['can_post_stories'] = $can_post_stories;
        if (null !== $can_edit_stories) $args['can_edit_stories'] = $can_edit_stories;
        if (null !== $can_delete_stories) $args['can_delete_stories'] = $can_delete_stories;
        if (null !== $can_manage_topics) $args['can_manage_topics'] = $can_manage_topics;

        return $this->Request('promoteChatMember', $args);
    }

    public function setChatAdministratorCustomTitle(
        int|string $chat_id, 
        int $user_id, 
        string $custom_title
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'user_id' => $user_id,
            'custom_title' => $custom_title
        ];


        return $this->Request('setChatAdministratorCustomTitle', $args);
    }

    public function banChatSenderChat(
        int|string $chat_id, 
        int $sender_chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'sender_chat_id' => $sender_chat_id
        ];


        return $this->Request('banChatSenderChat', $args);
    }

    public function unbanChatSenderChat(
        int|string $chat_id, 
        int $sender_chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'sender_chat_id' => $sender_chat_id
        ];


        return $this->Request('unbanChatSenderChat', $args);
    }

    public function setChatPermissions(
        int|string $chat_id, 
        array $permissions, 
        ?bool $use_independent_chat_permissions
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'permissions' => json_encode($permissions)
        ];

        if (null !== $use_independent_chat_permissions) $args['use_independent_chat_permissions'] = $use_independent_chat_permissions;

        return $this->Request('setChatPermissions', $args);
    }

    public function exportChatInviteLink(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('exportChatInviteLink', $args);
    }

    public function createChatInviteLink(
        int|string $chat_id, 
        ?string $name, 
        ?int $expire_date, 
        ?int $member_limit, 
        ?bool $creates_join_request
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];

        if (null !== $name) $args['name'] = $name;
        if (null !== $expire_date) $args['expire_date'] = $expire_date;
        if (null !== $member_limit) $args['member_limit'] = $member_limit;
        if (null !== $creates_join_request) $args['creates_join_request'] = $creates_join_request;

        return $this->Request('createChatInviteLink', $args);
    }

    public function editChatInviteLink(
        int|string $chat_id, 
        string $invite_link, 
        ?string $name, 
        ?int $expire_date, 
        ?int $member_limit, 
        ?bool $creates_join_request
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'invite_link' => $invite_link
        ];

        if (null !== $name) $args['name'] = $name;
        if (null !== $expire_date) $args['expire_date'] = $expire_date;
        if (null !== $member_limit) $args['member_limit'] = $member_limit;
        if (null !== $creates_join_request) $args['creates_join_request'] = $creates_join_request;

        return $this->Request('editChatInviteLink', $args);
    }

    public function revokeChatInviteLink(
        int|string $chat_id, 
        string $invite_link
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'invite_link' => $invite_link
        ];


        return $this->Request('revokeChatInviteLink', $args);
    }

    public function approveChatJoinRequest(
        int|string $chat_id, 
        int $user_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'user_id' => $user_id
        ];


        return $this->Request('approveChatJoinRequest', $args);
    }

    public function declineChatJoinRequest(
        int|string $chat_id, 
        int $user_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'user_id' => $user_id
        ];


        return $this->Request('declineChatJoinRequest', $args);
    }

    public function setChatPhoto(
        int|string $chat_id, 
        \CURLFile $photo
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'photo' => $photo
        ];


        return $this->Request('setChatPhoto', $args);
    }

    public function deleteChatPhoto(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('deleteChatPhoto', $args);
    }

    public function setChatTitle(
        int|string $chat_id, 
        string $title
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'title' => $title
        ];


        return $this->Request('setChatTitle', $args);
    }

    public function setChatDescription(
        int|string $chat_id, 
        ?string $description
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];

        if (null !== $description) $args['description'] = $description;

        return $this->Request('setChatDescription', $args);
    }

    public function pinChatMessage(
        int|string $chat_id, 
        int $message_id, 
        ?bool $disable_notification
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'message_id' => $message_id
        ];

        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;

        return $this->Request('pinChatMessage', $args);
    }

    public function unpinChatMessage(
        int|string $chat_id, 
        ?int $message_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];

        if (null !== $message_id) $args['message_id'] = $message_id;

        return $this->Request('unpinChatMessage', $args);
    }

    public function unpinAllChatMessages(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('unpinAllChatMessages', $args);
    }

    public function leaveChat(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('leaveChat', $args);
    }

    public function getChat(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('getChat', $args);
    }

    public function getChatAdministrators(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('getChatAdministrators', $args);
    }

    public function getChatMemberCount(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('getChatMemberCount', $args);
    }

    public function getChatMember(
        int|string $chat_id, 
        int $user_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'user_id' => $user_id
        ];


        return $this->Request('getChatMember', $args);
    }

    public function setChatStickerSet(
        int|string $chat_id, 
        string $sticker_set_name
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'sticker_set_name' => $sticker_set_name
        ];


        return $this->Request('setChatStickerSet', $args);
    }

    public function deleteChatStickerSet(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('deleteChatStickerSet', $args);
    }

    public function getForumTopicIconStickers()
    {
        return $this->Request('getForumTopicIconStickers', []);
    }

    public function createForumTopic(
        int|string $chat_id, 
        string $name, 
        ?int $icon_color, 
        ?string $icon_custom_emoji_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'name' => $name
        ];

        if (null !== $icon_color) $args['icon_color'] = $icon_color;
        if (null !== $icon_custom_emoji_id) $args['icon_custom_emoji_id'] = $icon_custom_emoji_id;

        return $this->Request('createForumTopic', $args);
    }

    public function editForumTopic(
        int|string $chat_id, 
        int $message_thread_id, 
        ?string $name, 
        ?string $icon_custom_emoji_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'message_thread_id' => $message_thread_id
        ];

        if (null !== $name) $args['name'] = $name;
        if (null !== $icon_custom_emoji_id) $args['icon_custom_emoji_id'] = $icon_custom_emoji_id;

        return $this->Request('editForumTopic', $args);
    }

    public function closeForumTopic(
        int|string $chat_id, 
        int $message_thread_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'message_thread_id' => $message_thread_id
        ];


        return $this->Request('closeForumTopic', $args);
    }

    public function reopenForumTopic(
        int|string $chat_id, 
        int $message_thread_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'message_thread_id' => $message_thread_id
        ];


        return $this->Request('reopenForumTopic', $args);
    }

    public function deleteForumTopic(
        int|string $chat_id, 
        int $message_thread_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'message_thread_id' => $message_thread_id
        ];


        return $this->Request('deleteForumTopic', $args);
    }

    public function unpinAllForumTopicMessages(
        int|string $chat_id, 
        int $message_thread_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'message_thread_id' => $message_thread_id
        ];


        return $this->Request('unpinAllForumTopicMessages', $args);
    }

    public function editGeneralForumTopic(
        int|string $chat_id, 
        string $name
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'name' => $name
        ];


        return $this->Request('editGeneralForumTopic', $args);
    }

    public function closeGeneralForumTopic(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('closeGeneralForumTopic', $args);
    }

    public function reopenGeneralForumTopic(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('reopenGeneralForumTopic', $args);
    }

    public function hideGeneralForumTopic(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('hideGeneralForumTopic', $args);
    }

    public function unhideGeneralForumTopic(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('unhideGeneralForumTopic', $args);
    }

    public function unpinAllGeneralForumTopicMessages(
        int|string $chat_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id
        ];


        return $this->Request('unpinAllGeneralForumTopicMessages', $args);
    }

    public function answerCallbackQuery(
        string $callback_query_id, 
        ?string $text, 
        ?bool $show_alert, 
        ?string $url, 
        ?int $cache_time
    ): \stdClass {
        $args = [
            'callback_query_id' => $callback_query_id
        ];

        if (null !== $text) $args['text'] = $text;
        if (null !== $show_alert) $args['show_alert'] = $show_alert;
        if (null !== $url) $args['url'] = $url;
        if (null !== $cache_time) $args['cache_time'] = $cache_time;

        return $this->Request('answerCallbackQuery', $args);
    }

    public function getUserChatBoosts(
        int|string $chat_id, 
        int $user_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'user_id' => $user_id
        ];


        return $this->Request('getUserChatBoosts', $args);
    }

    public function setMyCommands(
        array $commands, 
        ?array $scope, 
        ?string $language_code
    ): \stdClass {
        $args = [
            'commands' => json_encode($commands)
        ];

        if (null !== $scope) $args['scope'] = json_encode($scope);
        if (null !== $language_code) $args['language_code'] = $language_code;

        return $this->Request('setMyCommands', $args);
    }

    public function deleteMyCommands(
        ?array $scope, 
        ?string $language_code
    ): \stdClass {
        $args = [];

        if (null !== $scope) $args['scope'] = json_encode($scope);
        if (null !== $language_code) $args['language_code'] = $language_code;

        return $this->Request('deleteMyCommands', $args);
    }

    public function getMyCommands(
        ?array $scope, 
        ?string $language_code
    ): \stdClass {
        $args = [];

        if (null !== $scope) $args['scope'] = json_encode($scope);
        if (null !== $language_code) $args['language_code'] = $language_code;

        return $this->Request('getMyCommands', $args);
    }

    public function setMyName(
        ?string $name, 
        ?string $language_code
    ): \stdClass {
        $args = [];

        if (null !== $name) $args['name'] = $name;
        if (null !== $language_code) $args['language_code'] = $language_code;

        return $this->Request('setMyName', $args);
    }

    public function getMyName(
        ?string $language_code
    ): \stdClass {
        $args = [];

        if (null !== $language_code) $args['language_code'] = $language_code;

        return $this->Request('getMyName', $args);
    }

    public function setMyDescription(
        ?string $description, 
        ?string $language_code
    ): \stdClass {
        $args = [];

        if (null !== $description) $args['description'] = $description;
        if (null !== $language_code) $args['language_code'] = $language_code;

        return $this->Request('setMyDescription', $args);
    }

    public function getMyDescription(
        ?string $language_code
    ): \stdClass {
        $args = [];

        if (null !== $language_code) $args['language_code'] = $language_code;

        return $this->Request('getMyDescription', $args);
    }

    public function setMyShortDescription(
        ?string $short_description, 
        ?string $language_code
    ): \stdClass {
        $args = [];

        if (null !== $short_description) $args['short_description'] = $short_description;
        if (null !== $language_code) $args['language_code'] = $language_code;

        return $this->Request('setMyShortDescription', $args);
    }

    public function getMyShortDescription(
        ?string $language_code
    ): \stdClass {
        $args = [];

        if (null !== $language_code) $args['language_code'] = $language_code;

        return $this->Request('getMyShortDescription', $args);
    }

    public function setChatMenuButton(
        ?int $chat_id, 
        ?array $menu_button
    ): \stdClass {
        $args = [];

        if (null !== $chat_id) $args['chat_id'] = $chat_id;
        if (null !== $menu_button) $args['menu_button'] = json_encode($menu_button);

        return $this->Request('setChatMenuButton', $args);
    }

    public function getChatMenuButton(
        ?int $chat_id
    ): \stdClass {
        $args = [];

        if (null !== $chat_id) $args['chat_id'] = $chat_id;

        return $this->Request('getChatMenuButton', $args);
    }

    public function setMyDefaultAdministratorRights(
        ?array $rights, 
        ?bool $for_channels
    ): \stdClass {
        $args = [];

        if (null !== $rights) $args['rights'] = json_encode($rights);
        if (null !== $for_channels) $args['for_channels'] = $for_channels;

        return $this->Request('setMyDefaultAdministratorRights', $args);
    }

    public function getMyDefaultAdministratorRights(
        ?bool $for_channels
    ): \stdClass {
        $args = [];

        if (null !== $for_channels) $args['for_channels'] = $for_channels;

        return $this->Request('getMyDefaultAdministratorRights', $args);
    }

    public function editMessageText(
        string $text, 
        int|string|null $chat_id, 
        ?int $message_id, 
        ?string $inline_message_id, 
        ?string $parse_mode, 
        ?array $entities, 
        ?array $link_preview_options, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'text' => $text
        ];

        if (null !== $chat_id) $args['chat_id'] = $chat_id;
        if (null !== $message_id) $args['message_id'] = $message_id;
        if (null !== $inline_message_id) $args['inline_message_id'] = $inline_message_id;
        if (null !== $parse_mode) $args['parse_mode'] = $parse_mode;
        if (null !== $entities) $args['entities'] = json_encode($entities);
        if (null !== $link_preview_options) $args['link_preview_options'] = json_encode($link_preview_options);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('editMessageText', $args);
    }

    public function editMessageCaption(
        int|string|null $chat_id, 
        ?int $message_id, 
        ?string $inline_message_id, 
        ?string $caption, 
        ?string $parse_mode, 
        ?array $caption_entities, 
        ?array $reply_markup
    ): \stdClass {
        $args = [];

        if (null !== $chat_id) $args['chat_id'] = $chat_id;
        if (null !== $message_id) $args['message_id'] = $message_id;
        if (null !== $inline_message_id) $args['inline_message_id'] = $inline_message_id;
        if (null !== $caption) $args['caption'] = $caption;
        if (null !== $parse_mode) $args['parse_mode'] = $parse_mode;
        if (null !== $caption_entities) $args['caption_entities'] = json_encode($caption_entities);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('editMessageCaption', $args);
    }

    public function editMessageMedia(
        array $media, 
        int|string|null $chat_id, 
        ?int $message_id, 
        ?string $inline_message_id, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
        ];

    foreach ($media as $key => $value) {
            if (is_object($value['media'])) {
                $args['upload' . $key] = $value['media'];
                $media[$key]['media'] = 'attach://upload' . $key;
            }
        }
        $args['media'] = json_encode($media);

        if (null !== $chat_id) $args['chat_id'] = $chat_id;
        if (null !== $message_id) $args['message_id'] = $message_id;
        if (null !== $inline_message_id) $args['inline_message_id'] = $inline_message_id;
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('editMessageMedia', $args);
    }

    public function editMessageLiveLocation(
        float $latitude, 
        float $longitude, 
        int|string|null $chat_id, 
        ?int $message_id, 
        ?string $inline_message_id, 
        ?float $horizontal_accuracy, 
        ?int $heading, 
        ?int $proximity_alert_radius, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'latitude' => $latitude,
            'longitude' => $longitude
        ];

        if (null !== $chat_id) $args['chat_id'] = $chat_id;
        if (null !== $message_id) $args['message_id'] = $message_id;
        if (null !== $inline_message_id) $args['inline_message_id'] = $inline_message_id;
        if (null !== $horizontal_accuracy) $args['horizontal_accuracy'] = $horizontal_accuracy;
        if (null !== $heading) $args['heading'] = $heading;
        if (null !== $proximity_alert_radius) $args['proximity_alert_radius'] = $proximity_alert_radius;
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('editMessageLiveLocation', $args);
    }

    public function stopMessageLiveLocation(
        int|string|null $chat_id, 
        ?int $message_id, 
        ?string $inline_message_id, 
        ?array $reply_markup
    ): \stdClass {
        $args = [];

        if (null !== $chat_id) $args['chat_id'] = $chat_id;
        if (null !== $message_id) $args['message_id'] = $message_id;
        if (null !== $inline_message_id) $args['inline_message_id'] = $inline_message_id;
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('stopMessageLiveLocation', $args);
    }

    public function editMessageReplyMarkup(
        int|string|null $chat_id, 
        ?int $message_id, 
        ?string $inline_message_id, 
        ?array $reply_markup
    ): \stdClass {
        $args = [];

        if (null !== $chat_id) $args['chat_id'] = $chat_id;
        if (null !== $message_id) $args['message_id'] = $message_id;
        if (null !== $inline_message_id) $args['inline_message_id'] = $inline_message_id;
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('editMessageReplyMarkup', $args);
    }

    public function stopPoll(
        int|string $chat_id, 
        int $message_id, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'message_id' => $message_id
        ];

        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('stopPoll', $args);
    }

    public function deleteMessage(
        int|string $chat_id, 
        int $message_id
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'message_id' => $message_id
        ];


        return $this->Request('deleteMessage', $args);
    }

    public function deleteMessages(
        int|string $chat_id, 
        array $message_ids
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'message_ids' => json_encode($message_ids)
        ];


        return $this->Request('deleteMessages', $args);
    }

    public function sendSticker(
        int|string $chat_id, 
        \CURLFile|string $sticker, 
        ?int $message_thread_id, 
        ?string $emoji, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'sticker' => $sticker
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $emoji) $args['emoji'] = $emoji;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendSticker', $args);
    }

    public function getStickerSet(
        string $name
    ): \stdClass {
        $args = [
            'name' => $name
        ];


        return $this->Request('getStickerSet', $args);
    }

    public function getCustomEmojiStickers(
        array $custom_emoji_ids
    ): \stdClass {
        $args = [
            'custom_emoji_ids' => json_encode($custom_emoji_ids)
        ];


        return $this->Request('getCustomEmojiStickers', $args);
    }

    public function uploadStickerFile(
        int $user_id, 
        \CURLFile $sticker, 
        string $sticker_format
    ): \stdClass {
        $args = [
            'user_id' => $user_id,
            'sticker' => $sticker,
            'sticker_format' => $sticker_format
        ];


        return $this->Request('uploadStickerFile', $args);
    }

    public function createNewStickerSet(
        int $user_id, 
        string $name, 
        string $title, 
        array $stickers, 
        string $sticker_format, 
        ?string $sticker_type, 
        ?bool $needs_repainting
    ): \stdClass {
        $args = [
            'user_id' => $user_id,
            'name' => $name,
            'title' => $title,
            'stickers' => json_encode($stickers),
            'sticker_format' => $sticker_format
        ];

        if (null !== $sticker_type) $args['sticker_type'] = $sticker_type;
        if (null !== $needs_repainting) $args['needs_repainting'] = $needs_repainting;

        return $this->Request('createNewStickerSet', $args);
    }

    public function addStickerToSet(
        int $user_id, 
        string $name, 
        array $sticker
    ): \stdClass {
        $args = [
            'user_id' => $user_id,
            'name' => $name,
            'sticker' => json_encode($sticker)
        ];


        return $this->Request('addStickerToSet', $args);
    }

    public function setStickerPositionInSet(
        string $sticker, 
        int $position
    ): \stdClass {
        $args = [
            'sticker' => $sticker,
            'position' => $position
        ];


        return $this->Request('setStickerPositionInSet', $args);
    }

    public function deleteStickerFromSet(
        string $sticker
    ): \stdClass {
        $args = [
            'sticker' => $sticker
        ];


        return $this->Request('deleteStickerFromSet', $args);
    }

    public function setStickerEmojiList(
        string $sticker, 
        array $emoji_list
    ): \stdClass {
        $args = [
            'sticker' => $sticker,
            'emoji_list' => json_encode($emoji_list)
        ];


        return $this->Request('setStickerEmojiList', $args);
    }

    public function setStickerKeywords(
        string $sticker, 
        ?array $keywords
    ): \stdClass {
        $args = [
            'sticker' => $sticker
        ];

        if (null !== $keywords) $args['keywords'] = json_encode($keywords);

        return $this->Request('setStickerKeywords', $args);
    }

    public function setStickerMaskPosition(
        string $sticker, 
        ?array $mask_position
    ): \stdClass {
        $args = [
            'sticker' => $sticker
        ];

        if (null !== $mask_position) $args['mask_position'] = json_encode($mask_position);

        return $this->Request('setStickerMaskPosition', $args);
    }

    public function setStickerSetTitle(
        string $name, 
        string $title
    ): \stdClass {
        $args = [
            'name' => $name,
            'title' => $title
        ];


        return $this->Request('setStickerSetTitle', $args);
    }

    public function setStickerSetThumbnail(
        string $name, 
        int $user_id, 
        \CURLFile|string|null $thumbnail
    ): \stdClass {
        $args = [
            'name' => $name,
            'user_id' => $user_id
        ];

        if (null !== $thumbnail) $args['thumbnail'] = $thumbnail;

        return $this->Request('setStickerSetThumbnail', $args);
    }

    public function setCustomEmojiStickerSetThumbnail(
        string $name, 
        ?string $custom_emoji_id
    ): \stdClass {
        $args = [
            'name' => $name
        ];

        if (null !== $custom_emoji_id) $args['custom_emoji_id'] = $custom_emoji_id;

        return $this->Request('setCustomEmojiStickerSetThumbnail', $args);
    }

    public function deleteStickerSet(
        string $name
    ): \stdClass {
        $args = [
            'name' => $name
        ];


        return $this->Request('deleteStickerSet', $args);
    }

    public function answerInlineQuery(
        string $inline_query_id, 
        array $results, 
        ?int $cache_time, 
        ?bool $is_personal, 
        ?string $next_offset, 
        ?array $button
    ): \stdClass {
        $args = [
            'inline_query_id' => $inline_query_id,
            'results' => json_encode($results)
        ];

        if (null !== $cache_time) $args['cache_time'] = $cache_time;
        if (null !== $is_personal) $args['is_personal'] = $is_personal;
        if (null !== $next_offset) $args['next_offset'] = $next_offset;
        if (null !== $button) $args['button'] = json_encode($button);

        return $this->Request('answerInlineQuery', $args);
    }

    public function answerWebAppQuery(
        string $web_app_query_id, 
        array $result
    ): \stdClass {
        $args = [
            'web_app_query_id' => $web_app_query_id,
            'result' => json_encode($result)
        ];


        return $this->Request('answerWebAppQuery', $args);
    }

    public function sendInvoice(
        int|string $chat_id, 
        string $title, 
        string $description, 
        string $payload, 
        string $provider_token, 
        string $currency, 
        array $prices, 
        ?int $message_thread_id, 
        ?int $max_tip_amount, 
        ?array $suggested_tip_amounts, 
        ?string $start_parameter, 
        ?string $provider_data, 
        ?string $photo_url, 
        ?int $photo_size, 
        ?int $photo_width, 
        ?int $photo_height, 
        ?bool $need_name, 
        ?bool $need_phone_number, 
        ?bool $need_email, 
        ?bool $need_shipping_address, 
        ?bool $send_phone_number_to_provider, 
        ?bool $send_email_to_provider, 
        ?bool $is_flexible, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'title' => $title,
            'description' => $description,
            'payload' => $payload,
            'provider_token' => $provider_token,
            'currency' => $currency,
            'prices' => json_encode($prices)
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $max_tip_amount) $args['max_tip_amount'] = $max_tip_amount;
        if (null !== $suggested_tip_amounts) $args['suggested_tip_amounts'] = json_encode($suggested_tip_amounts);
        if (null !== $start_parameter) $args['start_parameter'] = $start_parameter;
        if (null !== $provider_data) $args['provider_data'] = $provider_data;
        if (null !== $photo_url) $args['photo_url'] = $photo_url;
        if (null !== $photo_size) $args['photo_size'] = $photo_size;
        if (null !== $photo_width) $args['photo_width'] = $photo_width;
        if (null !== $photo_height) $args['photo_height'] = $photo_height;
        if (null !== $need_name) $args['need_name'] = $need_name;
        if (null !== $need_phone_number) $args['need_phone_number'] = $need_phone_number;
        if (null !== $need_email) $args['need_email'] = $need_email;
        if (null !== $need_shipping_address) $args['need_shipping_address'] = $need_shipping_address;
        if (null !== $send_phone_number_to_provider) $args['send_phone_number_to_provider'] = $send_phone_number_to_provider;
        if (null !== $send_email_to_provider) $args['send_email_to_provider'] = $send_email_to_provider;
        if (null !== $is_flexible) $args['is_flexible'] = $is_flexible;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendInvoice', $args);
    }

    public function createInvoiceLink(
        string $title, 
        string $description, 
        string $payload, 
        string $provider_token, 
        string $currency, 
        array $prices, 
        ?int $max_tip_amount, 
        ?array $suggested_tip_amounts, 
        ?string $provider_data, 
        ?string $photo_url, 
        ?int $photo_size, 
        ?int $photo_width, 
        ?int $photo_height, 
        ?bool $need_name, 
        ?bool $need_phone_number, 
        ?bool $need_email, 
        ?bool $need_shipping_address, 
        ?bool $send_phone_number_to_provider, 
        ?bool $send_email_to_provider, 
        ?bool $is_flexible
    ): \stdClass {
        $args = [
            'title' => $title,
            'description' => $description,
            'payload' => $payload,
            'provider_token' => $provider_token,
            'currency' => $currency,
            'prices' => json_encode($prices)
        ];

        if (null !== $max_tip_amount) $args['max_tip_amount'] = $max_tip_amount;
        if (null !== $suggested_tip_amounts) $args['suggested_tip_amounts'] = json_encode($suggested_tip_amounts);
        if (null !== $provider_data) $args['provider_data'] = $provider_data;
        if (null !== $photo_url) $args['photo_url'] = $photo_url;
        if (null !== $photo_size) $args['photo_size'] = $photo_size;
        if (null !== $photo_width) $args['photo_width'] = $photo_width;
        if (null !== $photo_height) $args['photo_height'] = $photo_height;
        if (null !== $need_name) $args['need_name'] = $need_name;
        if (null !== $need_phone_number) $args['need_phone_number'] = $need_phone_number;
        if (null !== $need_email) $args['need_email'] = $need_email;
        if (null !== $need_shipping_address) $args['need_shipping_address'] = $need_shipping_address;
        if (null !== $send_phone_number_to_provider) $args['send_phone_number_to_provider'] = $send_phone_number_to_provider;
        if (null !== $send_email_to_provider) $args['send_email_to_provider'] = $send_email_to_provider;
        if (null !== $is_flexible) $args['is_flexible'] = $is_flexible;

        return $this->Request('createInvoiceLink', $args);
    }

    public function answerShippingQuery(
        string $shipping_query_id, 
        bool $ok, 
        ?array $shipping_options, 
        ?string $error_message
    ): \stdClass {
        $args = [
            'shipping_query_id' => $shipping_query_id,
            'ok' => $ok
        ];

        if (null !== $shipping_options) $args['shipping_options'] = json_encode($shipping_options);
        if (null !== $error_message) $args['error_message'] = $error_message;

        return $this->Request('answerShippingQuery', $args);
    }

    public function answerPreCheckoutQuery(
        string $pre_checkout_query_id, 
        bool $ok, 
        ?string $error_message
    ): \stdClass {
        $args = [
            'pre_checkout_query_id' => $pre_checkout_query_id,
            'ok' => $ok
        ];

        if (null !== $error_message) $args['error_message'] = $error_message;

        return $this->Request('answerPreCheckoutQuery', $args);
    }

    public function setPassportDataErrors(
        int $user_id, 
        array $errors
    ): \stdClass {
        $args = [
            'user_id' => $user_id,
            'errors' => json_encode($errors)
        ];


        return $this->Request('setPassportDataErrors', $args);
    }

    public function sendGame(
        int $chat_id, 
        string $game_short_name, 
        ?int $message_thread_id, 
        ?bool $disable_notification, 
        ?bool $protect_content, 
        ?array $reply_parameters, 
        ?array $reply_markup
    ): \stdClass {
        $args = [
            'chat_id' => $chat_id,
            'game_short_name' => $game_short_name
        ];

        if (null !== $message_thread_id) $args['message_thread_id'] = $message_thread_id;
        if (null !== $disable_notification) $args['disable_notification'] = $disable_notification;
        if (null !== $protect_content) $args['protect_content'] = $protect_content;
        if (null !== $reply_parameters) $args['reply_parameters'] = json_encode($reply_parameters);
        if (null !== $reply_markup) $args['reply_markup'] = json_encode($reply_markup);

        return $this->Request('sendGame', $args);
    }

    public function setGameScore(
        int $user_id, 
        int $score, 
        ?bool $force, 
        ?bool $disable_edit_message, 
        ?int $chat_id, 
        ?int $message_id, 
        ?string $inline_message_id
    ): \stdClass {
        $args = [
            'user_id' => $user_id,
            'score' => $score
        ];

        if (null !== $force) $args['force'] = $force;
        if (null !== $disable_edit_message) $args['disable_edit_message'] = $disable_edit_message;
        if (null !== $chat_id) $args['chat_id'] = $chat_id;
        if (null !== $message_id) $args['message_id'] = $message_id;
        if (null !== $inline_message_id) $args['inline_message_id'] = $inline_message_id;

        return $this->Request('setGameScore', $args);
    }

    public function getGameHighScores(
        int $user_id, 
        ?int $chat_id, 
        ?int $message_id, 
        ?string $inline_message_id
    ): \stdClass {
        $args = [
            'user_id' => $user_id
        ];

        if (null !== $chat_id) $args['chat_id'] = $chat_id;
        if (null !== $message_id) $args['message_id'] = $message_id;
        if (null !== $inline_message_id) $args['inline_message_id'] = $inline_message_id;

        return $this->Request('getGameHighScores', $args);
    }

}