# YT-DL PHP

A simple PHP library for downloading videos from YouTube, Instagram, X, and more. Powered by [Cobalt](https://github.com/imputnet/cobalt)

[![Powered by Cobalt](https://cobalt.tools/icons/favicon.ico)](https://github.com/imputnet/cobalt)

**Powered by [Cobalt](https://github.com/imputnet/cobalt)**

This library relies on Cobalt’s free API.

- **Cobalt Code:** [GitHub Repository](https://github.com/imputnet/cobalt)
- **Cobalt Site:** [Cobalt Tools](https://cobalt.tools/)
- **Cobalt API Docs:** [API Documentation](https://github.com/imputnet/cobalt/blob/current/docs/api.md)

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Methods](#methods)
- [Response Body Variables](#response-body-variables)
- [Picker Item Variables](#picker-item-variables)
- [Supported Services](#supported-services)
- [License](#license)
- [Contact](#contact)

## Installation

To install the `pira/ytdl` library, you need to use Composer. Run the following command:

```bash
composer require pira/ytdl
```

## Usage

After installing the library, you can start using it in your PHP project. Here's a basic example:

```php
<?php

use pira\YTDL;

require_once 'vendor/autoload.php';

try {
    $ytdl = new YTDL('https://www.youtube.com/watch?v=OAr6AIvH9VY');
    $ytdl->setQuality('480');
    $response = $ytdl->sendRequest();
    print_r($response);
} catch (Exception $e) {
    echo $e->getMessage();
}
```

## Methods

### `__construct(string $url)`

Initializes the `YTDL` class with a URL.

- **Parameters:**
  - `$url` (string): The URL to be used in requests.

### `setQuality(string $quality): void`

Sets the video quality for downloads.

- **Parameters:**
  - `$quality` (string): The desired video quality (e.g., `144`, `720`, `max`).
- **Throws:**
  - `Exception` if the provided quality is not valid.

### `setFilenamePattern(string $pattern): void`

Sets the filename pattern for downloaded files.

- **Parameters:**
  - `$pattern` (string): The desired filename pattern. Available patterns:
    - **classic:**
      - **Video:** `youtube_dQw4w9WgXcQ_640x360_h264.mp4`
      - **Audio:** `youtube_dQw4w9WgXcQ_audio.mp3`
    - **basic:**
      - **Video:** `Video Title (360p, h264).mp4`
      - **Audio:** `Audio Title - Audio Author.mp3`
    - **pretty:**
      - **Video:** `Video Title (360p, h264, youtube).mp4`
      - **Audio:** `Audio Title - Audio Author (soundcloud).mp3`
    - **nerdy:**
      - **Video:** `Video Title (360p, h264, youtube, dQw4w9WgXcQ).mp4`
      - **Audio:** `Audio Title - Audio Author (soundcloud, 1242868615).mp3`
- **Throws:**
  - `Exception` if the provided pattern is not valid.

### `setVCodec(string $codec): void`

Sets the video codec for downloads.

- **Parameters:**
  - `$codec` (string): The desired video codec (e.g., `h264`, `av1`, `vp9`).
- **Throws:**
  - `Exception` if the provided codec is not valid.

### `setAFormat(string $format): void`

Sets the audio format for downloads.

- **Parameters:**
  - `$format` (string): The desired audio format (e.g., `mp3`, `ogg`, `wav`).
- **Throws:**
  - `Exception` if the provided format is not valid.

### `enableAudioOnly(): void`

Enables downloading only audio.

### `enableTTFullAudio(): void`

Enables downloading the original sound from a TikTok video.

### `enableAudioMuted(): void`

Enables muting the audio track in video downloads.

### `enableDubLang(): void`

Enables using the Accept-Language header for YouTube video audio tracks.

### `enableDisableMetadata(): void`

Enables disabling file metadata.

### `enableTwitterGif(): void`

Enables converting Twitter gifs to .gif format.

### `enableTiktokH265(): void`

Enables preferring 1080p h265 videos for TikTok.

### `setAcceptLanguage(string $language): void`

Sets the custom Accept-Language header value for requests.

- **Parameters:**
  - `$language` (string): The custom Accept-Language header value.

### `sendRequest(): array`

Sends the configured request to the API and returns the response.

- **Returns:**
  - An associative array containing the status and data of the response.
- **Throws:**

  - `Exception` if there is an error in sending the request.

## Response Body Variables

| key          | type     | variables                                                   |
| :----------- | :------- | :---------------------------------------------------------- |
| `status`     | `string` | `error / redirect / stream / success / rate-limit / picker` |
| `text`       | `string` | various text, mostly used for errors                        |
| `url`        | `string` | direct link to a file or a link to cobalt's live render     |
| `pickerType` | `string` | `various / images`                                          |
| `picker`     | `array`  | array of picker items                                       |
| `audio`      | `string` | direct link to a file or a link to cobalt's live render     |

Source: [Cobalt API Documentation - Response Body Variables](https://github.com/imputnet/cobalt/blob/current/docs/api.md#response-body-variables)

## Picker Item Variables

item type: `object`

| key     | type     | variables                                               | description                            |
| :------ | :------- | :------------------------------------------------------ | :------------------------------------- |
| `type`  | `string` | `video / photo / gif`                                   | used only if `pickerType` is `various` |
| `url`   | `string` | direct link to a file or a link to cobalt's live render |                                        |
| `thumb` | `string` | item thumbnail that's displayed in the picker           | used for `video` and `gif` types       |

Source: [Cobalt API Documentation - Picker Item Variables](https://github.com/imputnet/cobalt/blob/current/docs/api.md#picker-item-variables)

## Supported Services

This list is not final and keeps expanding over time.

| service                        | video + audio | only audio | only video | metadata | rich file names |
| :----------------------------- | :-----------: | :--------: | :--------: | :------: | :-------------: |
| bilibili.com & bilibili.tv     |      ✅       |     ✅     |     ✅     |    ➖    |       ➖        |
| dailymotion                    |      ✅       |     ✅     |     ✅     |    ✅    |       ✅        |
| instagram posts & reels        |      ✅       |     ✅     |     ✅     |    ➖    |       ➖        |
| facebook videos                |      ✅       |     ❌     |     ❌     |    ➖    |       ➖        |
| loom                           |      ✅       |     ❌     |     ✅     |    ✅    |       ➖        |
| ok video                       |      ✅       |     ❌     |     ✅     |    ✅    |       ✅        |
| pinterest                      |      ✅       |     ✅     |     ✅     |    ➖    |       ➖        |
| reddit                         |      ✅       |     ✅     |     ✅     |    ❌    |       ❌        |
| rutube                         |      ✅       |     ✅     |     ✅     |    ✅    |       ✅        |
| snapchat stories & spotlights  |      ✅       |     ✅     |     ✅     |    ➖    |       ➖        |
| soundcloud                     |      ➖       |     ✅     |     ➖     |    ✅    |       ✅        |
| streamable                     |      ✅       |     ✅     |     ✅     |    ➖    |       ➖        |
| tiktok                         |      ✅       |     ✅     |     ✅     |    ❌    |       ❌        |
| tumblr                         |      ✅       |     ✅     |     ✅     |    ➖    |       ➖        |
| twitch clips                   |      ✅       |     ✅     |     ✅     |    ✅    |       ✅        |
| twitter/x                      |      ✅       |     ✅     |     ✅     |    ➖    |       ➖        |
| vimeo                          |      ✅       |     ✅     |     ✅     |    ✅    |       ✅        |
| vine archive                   |      ✅       |     ✅     |     ✅     |    ➖    |       ➖        |
| vk videos & clips              |      ✅       |     ❌     |     ✅     |    ✅    |       ✅        |
| youtube videos, shorts & music |      ✅       |     ✅     |     ✅     |    ✅    |       ✅        |

| emoji | meaning                 |
| :---: | :---------------------- |
|  ✅   | supported               |
|  ➖   | impossible/unreasonable |
|  ❌   | not supported           |

Source: [Cobalt - Supported Services](https://github.com/imputnet/cobalt#supported-services)

### Additional Notes or Features

| service    | notes or features                                                                                                    |
| :--------- | :------------------------------------------------------------------------------------------------------------------- |
| instagram  | Supports reels, photos, and videos. Lets you pick what to save from multi-media posts.                               |
| facebook   | Supports public accessible videos content only.                                                                      |
| pinterest  | Supports photos, gifs, videos and stories.                                                                           |
| reddit     | Supports gifs and videos.                                                                                            |
| snapchat   | Supports spotlights and stories. Lets you pick what to save from stories.                                            |
| rutube     | Supports yappy & private links.                                                                                      |
| soundcloud | Supports private links.                                                                                              |
| tiktok     | Supports videos with or without watermark, images from slideshow without watermark, and full (original) audios.      |
| twitter/x  | Lets you pick what to save from multi-media posts. May not be 100% reliable due to current management.               |
| vimeo      | Audio downloads are only available for dash.                                                                         |
| youtube    | Supports videos, music, and shorts. 8K, 4K, HDR, VR, and high FPS videos. Rich metadata & dubs. h264/av1/vp9 codecs. |

Source: [Cobalt - Additional Notes or Features per Service](https://github.com/imputnet/cobalt#additional-notes-or-features-per-service)

If support for a service you want is missing, create an issue (or a pull request 👀) on [Cobalt's GitHub repository](https://github.com/imputnet/cobalt).

## License

This library is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

## Contact

For any queries or issues, please contact:

- **Name:** Hossein Pira
- **Email:** [h3dev.pira@gmail.com](mailto:h3dev.pira@gmail.com)
- **Instagram**: [@h3dev.pira](https://instagram.com/h3dev.pira)
- **Telegram:** [@h3dev](https://t.me/h3dev)

## References

- **Cobalt Code:** [GitHub Repository](https://github.com/imputnet/cobalt)
- **Cobalt Site:** [Cobalt Tools](https://cobalt.tools/)
- **Cobalt API Docs:** [API Documentation](https://github.com/imputnet/cobalt/blob/current/docs/api.md)