<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectFile;
use App\Models\ProjectFileCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Toastr;
class ProjectFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('project-file-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $projectCategoryFiles = ProjectFileCategory::all();
        $projectFile = ProjectFile::with('category')->get();
        return view('admin.pages.fileManagement.projectFile.index', compact('projectCategoryFiles', 'projectFile'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'title' => 'required',

            ]);
            $sceneShortPaths = [];
            if ($request->hasFile('scene_short')) {
                foreach ($request->file('scene_short') as $sceneShortFile) {
                    $sceneShortName = time() . '_' . uniqid() . '.' . $sceneShortFile->extension();
                    $sceneShortFile->move(public_path('images/scene_short'), $sceneShortName);
                    $sceneShortPaths[] = $sceneShortName;
                }
            }
            $documentName = time().'.'.$request->document->extension();
            $request->document->move(public_path('images/document'), $documentName);
            $sourceCodeName = time().'.'.$request->source_code_zip->extension();
            $request->source_code_zip->move(public_path('images/source_code_file'), $sourceCodeName);
            $apkName = null;
            if ($request->hasFile('apk_file')) {
                $apkName = time().'.'.$request->file('apk_file')->extension();
                $request->file('apk_file')->move(public_path('images/apk_file'), $apkName);
            }
            $apiName = null;
            if ($request->hasFile('api_file')) {
                $apiName = time().'.'.$request->file('api_file')->extension();
                $request->file('api_file')->move(public_path('images/api_file'), $apiName);
            }
            $srsName = null;
            if ($request->hasFile('srs')) {
                $srsName = time().'.'.$request->file('srs')->extension();
                $request->file('srs')->move(public_path('images/srs_file'), $srsName);
            }
            $sqlName = null;
            if ($request->hasFile('sql')) {
                $sqlName = time().'.'.$request->file('sql')->extension();
                $request->file('sql')->move(public_path('images/sql_file'), $sqlName);
            }

            $eoiName = null;
            if ($request->hasFile('eoi_file')) {
                $eoiName = time().'.'.$request->file('eoi_file')->extension();
                $request->file('eoi_file')->move(public_path('images/eoi_file'), $eoiName);
            }


            $rfpName = null;
            if ($request->hasFile('rfp_file')) {
                $rfpName = time().'.'.$request->file('rfp_file')->extension();
                $request->file('rfp_file')->move(public_path('images/rfp_file'), $rfpName);
            }


            $contractName = null;
            if ($request->hasFile('contract_sign_file')) {
                $contractName = time().'.'.$request->file('contract_sign_file')->extension();
                $request->file('contract_sign_file')->move(public_path('images/contract_sign_file'), $contractName);
            }

            $releaseName = null;
            if ($request->hasFile('release_file')) {
                $releaseName = time().'.'.$request->file('release_file')->extension();
                $request->file('release_file')->move(public_path('images/release_file'), $releaseName);
            }

            $projectFile = new ProjectFile();
            $projectFile->title = $request->title;
            $projectFile->category_id = $request->category_id;
            $projectFile->note = $request->note;
            $projectFile->apk_file = $apkName ?? null;
            $projectFile->document = $documentName;
            $projectFile->source_code_zip = $sourceCodeName;
            $projectFile->api_file = $apiName ?? null;
            $projectFile->srs = $srsName ?? null;
            $projectFile->sql = $sqlName ?? null;
            $projectFile->eoi_file = $eoiName ?? null;
            $projectFile->rfp_file = $rfpName ?? null;
            $projectFile->contract_sign_file = $contractName ?? null;
            $projectFile->release_file = $releaseName ?? null;
            $projectFile->scene_short = json_encode($sceneShortPaths);
            $projectFile->save();
            Toastr::success('Project File Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // Fetch the project file by ID
            $projectFile = ProjectFile::findOrFail($id);
            // Delete files
            $this->deleteFileIfExists(public_path('images/apk_file/' . $projectFile->apk_file));
            $this->deleteFileIfExists(public_path('images/document/' . $projectFile->document));
            $this->deleteFileIfExists(public_path('images/source_code_file/' . $projectFile->source_code_zip));
            $this->deleteFileIfExists(public_path('images/api_file/' . $projectFile->api_file));
            $this->deleteFileIfExists(public_path('images/srs_file/' . $projectFile->srs));
            $this->deleteFileIfExists(public_path('images/sql_file/' . $projectFile->sql));
            $this->deleteFileIfExists(public_path('images/eoi_file/' . $projectFile->eoi_file));
            $this->deleteFileIfExists(public_path('images/rfp_file/' . $projectFile->rfp_file));
            $this->deleteFileIfExists(public_path('images/contract_sign_file/' . $projectFile->contract_sign_file));
            $this->deleteFileIfExists(public_path('images/release_file/' . $projectFile->release_file));


            // Delete scene_short images
            $sceneShortPaths = json_decode($projectFile->scene_short);
            foreach ($sceneShortPaths as $sceneShortPath) {
                $this->deleteFileIfExists(public_path('images/scene_short/' . $sceneShortPath));
            }

            // Delete the database record
            $projectFile->delete();

            Toastr::success('Project File Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    private function deleteFileIfExists($path)
    {
        if (File::exists($path)) {
            File::delete($path);
        }
    }

}
