let LIGNES_VENTES_FT = {};

function addLigneVenteFT()
{
    let article = $('#article').val();
    let quantite = $('#quantite').val();
    let unite = $('#unite').val();
    let valeur = $('#valeur').val();

    if(article =="" || quantite == "" || unite =="" || valeur == "")
    {
        $('.txt_message_error').html("Veuillez remplir tous les champs");
        $('.sect_error').removeClass('invisible');
    }
    else
    {
        LIGNES_VENTES_FT[article] = {"quantite":quantite,"unite":unite,"valeur":valeur};
        $('.ligne_vente').val( JSON.stringify(LIGNES_VENTES_FT) );
        writeLigneVenteFT(LIGNES_VENTES_FT,'.lignevente');
    }
}

function removeLigneVenteFT(idligne)
{
    $(`#${idligne}`).addClass("invisible");
    delete LIGNES_VENTES_FT[idligne];
    if( Object.keys(LIGNES_VENTES_FT).length > 0)
        $('.ligne_vente').val( JSON.stringify(LIGNES_VENTES_FT) );
    else
        $('.ligne_vente').val( "" );   
}

function writeLigneVenteFT(lignes,tbody)
{
    let text ="";
    for (const element in lignes) {
        let txt = 
            `<tr id="${element}">
                <td> ${element} </td>
                <td> ${lignes[element].quantite} </td>
                <td> ${lignes[element].unite} </td>
                <td> ${lignes[element].valeur} </td>
                <td> 
                    <button type="button" onclick="removeLigneVenteFT('${element}')"> 
                        <i class="fas fa-trash" aria-hidden="true"></i> 
                    </button>
                </td>
            </tr>`;
        text = text.concat(txt); 
    }
    
    $(tbody).html(text);
}