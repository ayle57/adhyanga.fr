import roomOne from '../../../public/images/rooms/room1.svg';
import roomTwo from '../../../public/images/rooms/room2.svg';
import Image from "next/image";

export default function Cabinet() {
    return (
        <section className="section cabinet" id="cabinet">
            <div className="cabinet-inner">
                <div className="__header">
                    <span>Le cabinet de soins</span>
                    <h2>Découvrez notre cabinet de soins.</h2>
                </div>

                <div className="__body">
                    <div className="cabinet-container">
                        <div className="cabinet-item">
                            <Image src={roomOne} alt="Salle de massage"/>
                            <h6>Salle de massage</h6>
                        </div>
                        <div className="cabinet-item">
                            <Image src={roomTwo} alt="Salle d'accueil avec une affiche"/>
                            <h6>Accueil</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}
