import kinesiologie from "../../../public/images/cells/kinesiologie.svg";
import arrow_right from "../../../public/images/svg/arrow-right.svg";
import ayurveda from "../../../public/images/cells/ayurveda.svg";
import lithotherapie from "../../../public/images/cells/lithotherapie.svg";
import Link from "next/link";
import Image from "next/image";

export default function Services() {
    return (
        <section className="section services" id="services">
            <div className="services-inner">
                <div className="__header">
                    <span>Nos services</span>
                    <h2>Retrouvez nos services et quelques petites informations. </h2>
                </div>
                <div className="__body">
                    <div className="services-container">
                        {/* --- Kinésiologie --- */}
                        <div className="service-item">
                            <div className="service-item-header">
                                <Image src={kinesiologie} alt="Une personne dans un fond vert"/>
                            </div>
                            <div className="service-item-body">
                                <h4>
                                    Kinésiologie
                                </h4>
                                <p>
                                    Apprenez en plus à propos de la kinésiologie.
                                </p>
                            </div>
                            <div className="service-item-footer">
                                <Link href="/kinesiologie">
                                    <span className="link-text">
                                        Explorer la page
                                    </span>
                                    <span className="link-image">
                                        <Image src={arrow_right} alt="Flèche vers la droite"/>
                                    </span>
                                </Link>
                            </div>
                        </div>


                        {/* --- Ayurveda --- */}
                        <div className="service-item">
                            <div className="service-item-header">
                                <Image src={ayurveda} alt="Deux personnes ce seranrt la main"/>
                            </div>
                            <div className="service-item-body">
                                <h4>
                                    Ayurvéda
                                </h4>
                                <p>
                                    Apprenez en plus à propos de l'ayurvéda.
                                </p>
                            </div>
                            <div className="service-item-footer">
                                <Link href="/ayurveda">
                                    <span className="link-text">
                                        Explorer la page
                                    </span>
                                    <span className="link-image">
                                        <Image src={arrow_right} alt="Flèche vers la droite"/>
                                    </span>
                                </Link>
                            </div>
                        </div>


                        {/* --- Lithotherapie --- */}
                        <div className="service-item">
                            <div className="service-item-header">
                                <Image src={lithotherapie} alt="Une personne sur un banc"/>
                            </div>
                            <div className="service-item-body">
                                <h4>
                                    Lithothérapie
                                </h4>
                                <p>
                                    Apprenez en plus à propos de la lithothérapie.
                                </p>
                            </div>
                            <div className="service-item-footer">
                                <Link href="/lithotherapie">
                                    <span className="link-text">
                                        Explorer la page
                                    </span>
                                    <span className="link-image">
                                        <Image src={arrow_right} alt="Flèche vers la droite"/>
                                    </span>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}
