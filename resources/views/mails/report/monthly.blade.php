<div>
    @if($churchRecords->isNotEmpty())
        <h2>Ενοριακός Ναός</h2>

        <ul>

            @foreach($churchRecords as $record)
                <li>
                    Εις
                    μνήμη {{ __($record->memoriam) . " από " . __($record->donor) . ", " .  __($record->amount) }}
                    €
                </li>
            @endforeach
        </ul>
    @endif
    @if($cemeteryRecords->isNotEmpty())
        <h2>Κοιμητήριο</h2>

        <ul>
            @foreach($cemeteryRecords as $record)
                <li>
                    Εις
                    μνήμη {{ __($record->memoriam) . " από " . __($record->donor) . ", " .  __($record->amount) }}
                    €
                </li>
            @endforeach
        </ul>
    @endif
    @if($parishRecords->isNotEmpty())
        <h2>Ενοριακά Δικαιώματα</h2>

        <ul>
            @foreach($parishRecords as $record)
                <li>
                    {{ __($record->memoriam) . " από " . __($record->donor) . ", " .  __($record->amount) }}
                    €
                </li>
            @endforeach
        </ul>
    @endif
</div>
