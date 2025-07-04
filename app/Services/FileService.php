<?php

namespace App\Services;

use App\Interfaces\Repositories\FileRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function __construct(
        private FileRepository $fileRepository
    ) {}

    public function updateFile($file, $idReferensi, $type, $context)
    {
        if (!($file instanceof \Illuminate\Http\UploadedFile)) {
            throw new \InvalidArgumentException('Invalid file upload.');
        }

        DB::beginTransaction();

        try {
            $randomString = bin2hex(random_bytes(16));
            $ext = $file->getClientOriginalExtension();
            $path = $file->storeAs("{$type}/{$idReferensi}", "{$randomString}.{$ext}", 'public');
            $foto = $this->fileRepository->getByTypeandReferenceId($type, $idReferensi, $context);

            if (!$foto) {
                $foto = $this->fileRepository->create([
                    'id_referensi' => $idReferensi,
                    'type' => $type,
                    'context' => $context,
                    'path' => $path,
                ]);
            } else {
                if (Storage::disk('public')->exists($foto->path)) {
                    Storage::disk('public')->delete($foto->path);
                }

                $foto = $this->fileRepository->update($foto->id, [
                    'path' => $path,
                ]);
            }

            DB::commit();
            return $foto;
        } catch (\Exception $e) {
            DB::rollBack();
            if (isset($path) && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            throw $e;
        }
    }
}
