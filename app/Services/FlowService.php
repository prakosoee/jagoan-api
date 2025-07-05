<?php 

namespace App\Services;

use App\Interfaces\Repositories\FlowRepository;

class FlowService
{
    public function __construct(
        private FlowRepository $flowRepository,
        private FileService $fileService
    ){}

    public function createFlow(array $flowRequest)
    {
        $flow =  $this->flowRepository->create($flowRequest);
        $upload_file = $this->fileService->updateFile($flowRequest['icon'], $flow->id, 'icon', 'flow');
        return $flow;
    }
    public function updateFlow(array $flowRequest, $id)
    {
        $flow = $this->flowRepository->update($id, $flowRequest);

        if (isset($flowRequest['icon'])) {
            $this->fileService->updateFile($flowRequest['icon'], $flow->id, 'icon', 'flow');
        }

        return $flow;
    }
    public function deleteFlow($id)
    {
        return $this->flowRepository->delete($id);
    }
}