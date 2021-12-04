<?php
declare(strict_types=1);

namespace App\Repository\Computer;

use App\Models\Computer;
use App\Repository\ComputerRepositoryInterface;

class ComputerRepository implements ComputerRepositoryInterface
{
    private Computer $computerModel;

    public function __construct(Computer $computerModel)
    {
        $this->computerModel = $computerModel;
    }

    public function all()
    {
        return $this->computerModel->get();
    }

    public function get(int $id)
    {
        return $this->computerModel->find($id);
    }
    public function storeAndReturnId(array $computerData)
    {
        $computer = $this->computerModel->newInstance();
        $computer->brand = $computerData['brand'];
        $computer->model = $computerData['model'];
        $computer->type_id = $computerData['type_id'];
        $computer->processor = $computerData['processor'];
        $computer->motherboard = $computerData['motherboard'];
        $computer->ram = $computerData['ram'];
        $computer->description = $computerData['description'];
        $computer->worker_id = $computerData['worker_id'];
        $computer->ip_address = $computerData['ip_address'] ?? 'Dynamic';
        $computer->computer_name = $computerData['computer_name'];
        $computer->save();

        return $computer->id;
    }
}
