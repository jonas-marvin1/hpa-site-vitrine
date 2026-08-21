<!-- Pop-up Global Store -->
<style>
    .store-popup-overlay {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.6);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    .store-popup-content {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        width: 90%;
        max-width: 400px;
        position: relative;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    .store-popup-close {
        position: absolute;
        top: 10px; right: 15px;
        font-size: 24px;
        cursor: pointer;
        color: #555;
    }
    .store-popup-close:hover {
        color: red;
    }
    .store-popup-content h3 {
        color: var(--blue, #1c2331);
        font-weight: bold;
        margin-bottom: 10px;
    }
    .store-popup-content p {
        color: #555;
        font-size: 14px;
        margin-bottom: 20px;
    }
    .store-popup-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .store-popup-btn {
        width: 100%;
        padding: 10px;
        background: var(--red, #e30613);
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    }
    .store-popup-btn:hover {
        background: #b30000;
    }
</style>

<div class="store-popup-overlay" id="storePopup">
    <div class="store-popup-content">
        <span class="store-popup-close" onclick="closeStorePopup()">&times;</span>
        <img src="img/logo.png" alt="HPA" style="width:80px; margin-bottom: 15px;">
        <h3>Ne manquez aucune opportunité !</h3>
        <p>Inscrivez-vous pour recevoir nos offres exclusives et découvrir notre boutique.</p>
        <form id="storePopupForm">
            <input type="text" id="pop_nom" class="store-popup-input" placeholder="Votre Nom" required>
            <input type="text" id="pop_prenom" class="store-popup-input" placeholder="Votre Prénom" required>
            <input type="text" id="pop_whatsapp" class="store-popup-input" placeholder="Numéro WhatsApp" required>
            <input type="email" id="pop_email" class="store-popup-input" placeholder="Votre Email" required>
            <select id="pop_pays" class="store-popup-input" required>
                <?php include("pays.php"); ?>
            </select>
            <button type="submit" class="store-popup-btn mb-2">Envoyer mes informations</button>
            <a href="https://api.whatsapp.com/send?phone=2250708020244&text=Echangez%20avec%20Brouh%20OSSEY...%F0%9F%99%8F" target="_blank" class="store-popup-btn" style="background:#25D366; display:block; text-decoration:none; margin-top:10px;">
                <i class="fab fa-whatsapp"></i> Échanger avec un commercial
            </a>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Afficher le popup après 3 secondes si pas déjà vu
        if (!sessionStorage.getItem('storePopupSeen')) {
            setTimeout(() => {
                document.getElementById('storePopup').style.display = 'flex';
            }, 3000);
        }
    });

    function closeStorePopup() {
        document.getElementById('storePopup').style.display = 'none';
        sessionStorage.setItem('storePopupSeen', 'true');
    }

    document.getElementById('storePopupForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        let formData = new FormData();
        formData.append('nom', document.getElementById('pop_nom').value);
        formData.append('prenom', document.getElementById('pop_prenom').value);
        formData.append('whatsapp', document.getElementById('pop_whatsapp').value);
        formData.append('email', document.getElementById('pop_email').value);
        formData.append('pays', document.getElementById('pop_pays').value);

        fetch('traitement_popup.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            sessionStorage.setItem('storePopupSeen', 'true');
            window.location.href = 'store.php';
        })
        .catch(error => {
            console.error('Erreur:', error);
            window.location.href = 'store.php'; // Redirige même en cas d'erreur
        });
    });
</script>
