<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\VideoRepository;
use Illuminate\Validation\Rule;

class VideoController extends Controller
{
    protected $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function index(Request $request)
    {
        $videos = $this->videoRepository->getVideos($request);

        return view('backend.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new video.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.videos.create');
    }

    /**
     * Store a newly created video in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'category' => ['required', Rule::in(VideoRepository::$categories)],
            'feature_image' => ['required_if:video_type,upload', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'video_type' => ['required', Rule::in(['upload', 'youtube'])],
            'video_file' => ['required_if:video_type,upload', 'nullable', 'mimes:mp4', 'max:20000'], // Max 20MB
            'youtube_url' => ['required_if:video_type,youtube', 'nullable', 'url'],
        ];

        // Define custom error messages
        $messages = [
            'title.required' => 'The title field is required.',
            'category.required' => 'Please select a category.',
            'category.in' => 'Selected category is invalid.',
            'feature_image.required_if' => 'A thumbnail image is required for uploaded videos.',
            'feature_image.image' => 'The thumbnail must be an image file.',
            'feature_image.mimes' => 'The thumbnail image must be a file of type: jpeg, png, jpg, gif, svg.',
            'feature_image.max' => 'The thumbnail image may not be greater than 2MB.',
            'video_type.required' => 'Please select a video type.',
            'video_type.in' => 'Selected video type is invalid.',
            'video_file.required_if' => 'A video file is required for uploaded videos.',
            'video_file.mimes' => 'The video file must be a file of type: mp4.',
            'video_file.max' => 'The video file may not be greater than 20MB.',
            'youtube_url.required_if' => 'A YouTube URL is required for YouTube videos.',
            'youtube_url.url' => 'Please enter a valid YouTube URL.',
        ];

        // Validate the request
        $validatedData = $request->validate($rules, $messages);

        try {
            // Store the video using the repository
            $this->videoRepository->storeVideo($request, $validatedData);

            return redirect()->route('backend.videos.index')->with('success', 'Video created successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error creating video: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'An error occurred while creating the video.');
        }
    }

    /**
     * Show the form for editing the specified video.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $video = $this->videoRepository->findVideo($id);

        if (!$video) {
            return redirect()->route('backend.videos.index')->with('error', 'Video not found.');
        }

        return view('backend.videos.edit', compact('video'));
    }

    /**
     * Update the specified video in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $video = $this->videoRepository->findVideo($id);

        if (!$video) {
            return redirect()->route('backend.videos.index')->with('error', 'Video not found.');
        }

        // Define validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'category' => ['required', Rule::in(VideoRepository::$categories)],
            'feature_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'video_type' => ['required', Rule::in(['upload', 'youtube'])],
            'video_file' => ['required_if:video_type,upload', 'nullable', 'mimes:mp4', 'max:20000'], // Max 20MB
            'youtube_url' => ['required_if:video_type,youtube', 'nullable', 'url'],
        ];

        // Define custom error messages
        $messages = [
            'title.required' => 'The title field is required.',
            'category.required' => 'Please select a category.',
            'category.in' => 'Selected category is invalid.',
            'feature_image.image' => 'The thumbnail must be an image file.',
            'feature_image.mimes' => 'The thumbnail image must be a file of type: jpeg, png, jpg, gif, svg.',
            'feature_image.max' => 'The thumbnail image may not be greater than 2MB.',
            'video_type.required' => 'Please select a video type.',
            'video_type.in' => 'Selected video type is invalid.',
            'video_file.required_if' => 'A video file is required for uploaded videos.',
            'video_file.mimes' => 'The video file must be a file of type: mp4.',
            'video_file.max' => 'The video file may not be greater than 20MB.',
            'youtube_url.required_if' => 'A YouTube URL is required for YouTube videos.',
            'youtube_url.url' => 'Please enter a valid YouTube URL.',
        ];

        // Validate the request
        $validatedData = $request->validate($rules, $messages);

        try {
            // Update the video using the repository
            $this->videoRepository->updateVideo($id, $request);

            return redirect()->route('backend.videos.index')->with('success', 'Video updated successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error updating video: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'An error occurred while updating the video.');
        }
    }

    /**
     * Remove the specified video from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $video = $this->videoRepository->findVideo($id);

        if (!$video) {
            return redirect()->route('backend.videos.index')->with('error', 'Video not found.');
        }

        try {
            // Delete the video using the repository
            $this->videoRepository->deleteVideo($video->id);

            return redirect()->route('backend.videos.index')->with('success', 'Video deleted successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error deleting video: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while deleting the video.');
        }
    }
}
