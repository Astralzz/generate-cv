<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonalInfoResource;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Exceptions\HttpResponseException;

class PDFController extends Controller
{

    /**
     * @var Request $request
     */
    protected $request;

    /**
     * @constructor
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Ver curriculum por defecto
     *
     * @param string $id - [X-Data-Id]
     *
     * @throws \HttpResponseException
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCv()
    {

        try {

            // Obtenemos referencia encriptada
            $idInf = $this->request->header('X-Data-Id') ?? 1;

            // Obtenemos Información
            $person = PersonalInfo::where('id', $idInf)->first();

            // ? No existe
            if (!$person) throw new \Exception('No se encontró la información personal');

            // Mostramos
            $data = new PersonalInfoResource($person);
            $dataArray = $data->toArray(request());

            // Convertir cada colección en array, pasando `request()` como argumento
            $dataArray['skills'] = $dataArray['skills'] ? $dataArray['skills']->toArray(request()) : null;
            $dataArray['social_links'] = $dataArray['social_links'] ? $dataArray['social_links']->toArray(request()) : null;
            $dataArray['work_experience'] = $dataArray['work_experience'] ? $dataArray['work_experience']->toArray(request()) : null;
            $dataArray['education'] = $dataArray['education'] ? $dataArray['education']->toArray(request()) : null;
            $dataArray['cv_customization'] = $dataArray['cv_customization'] ? $dataArray['cv_customization']->toArray(request()) : null;


            dd($dataArray);

            // Generar el PDF
            $pdf = Pdf::loadView('docs.cvs.default', $dataArray)
                ->setPaper('A4', 'portrait')
                ->setWarnings(false);

            // Mostrar el PDF en la misma página
            return $pdf->stream('cv.pdf');

            // Descargar el PDF
            // return $pdf->download('cv.pdf');

            // ! Error
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json(['error' => $th->getMessage()], 422));
        }
    }
}
