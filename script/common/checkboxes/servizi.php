<?php

if ($mn_servizi->num_rows === 0) {
    echo alert('danger', ' Popolare la tabella servizi cliccando sul bottone "Popola tabelle" sottostante');
}

while ($value = $mn_servizi->fetch_assoc()) {

    $tmp = (isset($servizi_checked) && isset($servizi_checked[$value['id']])) ? "checked" : "";
    echo "
            <div class=\"form-check col-md-3\">
                <input class=\"form-check-input\" type=\"checkbox\" name=\"op{$value['id']}\" $tmp >
                <label class=\"form-check-label\" for=\"op{$value['id']}\">
                    {$value["nome"]};
                </label>
            </div>";
}

// if ($mn_servizi->num_rows === 0) {
//     echo alert('danger', 'Popolare la tabella servizi cliccando sul bottone "Popola tabelle" sottostante');
// }

// while ( $value = $mn_servizi->fetch_assoc()) {

//     echo "
//     <div class=\"form-check col-md-3\">
//         <input class=\"form-check-input\" type=\"checkbox\" name=\"op{$value["id"]}\" >
//         <label class=\"form-check-label\" for=\"op{$value["id"]}\">
//             {$value["nome"]};
//         </label>
//     </div>";
// }
