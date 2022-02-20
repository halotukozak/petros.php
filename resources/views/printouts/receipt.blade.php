<x-printout-layout>
    <style type="text/css">
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        tr {
            overflow: hidden;
            padding: 15px;

        }

        td {
            padding: 15px;

        }

        h3 {
            padding: 30px;
        }
    </style>
    <table>
        <thead>
        <tr>
            <th>
                <img style="" height="130" src="{{asset('img/logo.png')}}">
            </th>
            <th style="font-weight: normal; font-size: x-small; text-align: left">
                ΙΕΡΟΣ ΚΑΘΟΛΙΚΟΣ ΕΝΟΡΙΑΚΟΣ ΝΑΟΣ ΑΜΙΑΝΤΟΥ ΣΥΛΛΗΨΕΩΣ ΤΗΣ ΘΕΟΤΟΚΟΥ<br/>
                (ΘΡΗΣΚΕΥΤΙΚΟ ΝΟΜΙΚΟ ΠΡΟΣΩΠΟ)<br/>
                ΒΑΡΗ – 841 00 ΣΥΡΟΣ<br/>
                ΑΦΜ 090006246 – ΔΟΥ ΣΥΡΟΥ<br/>
                ΤΗΛ. 22810 61300<br/>
            </th>
            <th
            ><h1>ΑΠΟΔΕΙΞΗ ΕΙΣΠΡΑΞΕΩΣ</h1>
                {{--                <p style="font-weight: normal">{{__('Vari') . ", " . Carbon\Carbon::parse($created_at)->format("d/m/Y")}}--}}
                <p style="font-weight: normal">{{"Βάρη, " . Carbon\Carbon::parse($created_at)->format("d/m/Y")}}
                    &nbsp;
                    &nbsp;
                    N<sup>0</sup> {{$id}}</p></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="2"><h3>Εισπράξαμε από: </h3>{{ $donor }}</td>
            <td>
                Το ποσό των:
                <h2>{{ $amount }} €</h2>

            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2">
                <h3>Αιτιολογία:</h3>
                <p>
                    @switch($purpose)
                        @case('church')
                        Προσφορά στον Ενοριακό Ναό
                        @break
                        @case('cemetery')
                        Προσφορά στο Κοιμητήριο Βάρης
                        @break
                        @case('parish')
                        Ενοριακά Δικαιώματα
                        @break
                        @default
                        Piotruś Zjebałeś
                    @endswitch
                </p>
                <br/>
                @if($memoriam != null)
                    <h3> Εις μνήμη:
                    </h3>
                    <p>{{ $memoriam }}</p>
                @endif

            </td>
            <td style="text-align: center">
                <h4>Ο ΕΙΣΠΡΑΞΑΣ</h4>
                <p>
                    <img height="60" src="{{ asset('img/podpis.jpeg') }}">
                </p>
                <h5 style="font-weight: normal;">Π. Πέτρος Κλυμ - Εφημέριος</h5></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        </tbody>
    </table>
</x-printout-layout>
