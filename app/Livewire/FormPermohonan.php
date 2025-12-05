<?php

namespace App\Livewire;

use App\Models\Pik;
use DateTime;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class FormPermohonan extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('nama_umum')->required(),
                        TextInput::make('nama_ilmiah')->required(),
                        TextInput::make('bentuk')->required(),
                        TextInput::make('jumlah')->required(),
                        TextInput::make('bahan_kemasan')->required(),
                        TextInput::make('tanda_kemasan')->required(),
                        TextInput::make('peti_kemas')->required(),
                        TextInput::make('nama_pengirim')->required(),
                        Textarea::make('alamat_pengirim')->columnSpanFull()->required(),
                        TextInput::make('lainnya_pengirim')->required(),
                        TextInput::make('nama_penerima')->required(),
                        Textarea::make('alamat_penerima')->columnSpanFull()->required(),
                        TextInput::make('lainnya_penerima')->required(),
                        TextInput::make('tujuan_pengeluaran')->required(),
                        TextInput::make('area_asal')->required(),
                        TextInput::make('area_tujuan')->required(),
                        TextInput::make('alat_angkut')->required(),
                        DatePicker::make('tanggal_berangkat')->required(),
                    ])
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        do {
            $random = Str::random(6);
            $nomorPik = strtoupper($random);
        } while (Pik::where('nomor_pik', $nomorPik)->exists());

        DB::beginTransaction();
        try {
            Pik::create([
                "nomor_pik" => $nomorPik,
                "nama_umum" => $this->form->getState()['nama_umum'],
                "nama_ilmiah" => $this->form->getState()['nama_ilmiah'],
                "bentuk" => $this->form->getState()['bentuk'],
                "jumlah" => $this->form->getState()['jumlah'],
                "bahan_kemasan" => $this->form->getState()['bahan_kemasan'],
                "tanda_kemasan" => $this->form->getState()['tanda_kemasan'],
                "peti_kemas" => $this->form->getState()['peti_kemas'],
                "nama_pengirim" => $this->form->getState()['nama_pengirim'],
                "alamat_pengirim" => $this->form->getState()['alamat_pengirim'],
                "lainnya_pengirim" => $this->form->getState()['lainnya_pengirim'],
                "nama_penerima" => $this->form->getState()['nama_penerima'],
                "alamat_penerima" => $this->form->getState()['alamat_penerima'],
                "lainnya_penerima" => $this->form->getState()['lainnya_penerima'],
                "tujuan_pengeluaran" => $this->form->getState()['tujuan_pengeluaran'],
                "area_asal" => $this->form->getState()['area_asal'],
                "area_tujuan" => $this->form->getState()['area_tujuan'],
                "alat_angkut" => $this->form->getState()['alat_angkut'],
                "tanggal_berangkat" => $this->form->getState()['tanggal_berangkat'],
                "status" => "baru",
            ]);

            DB::commit();
            Notification::make()
                ->title('Data Permohonan Tindakan Karantina Berhasil Dikirim')
                ->success()
                ->send();

            // Reinitialize the form to clear its data.
            $this->form->fill();
            to_route('success', $nomorPik);
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            Notification::make()
                ->title('Data Permohonan Tindakan Karantina Gagal Dikirim.')
                ->danger()
                ->send();
        }
    }

    public function render()
    {
        return view('livewire.form-permohonan');
    }
}
